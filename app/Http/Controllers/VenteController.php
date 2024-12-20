<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use App\Models\Vente;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class VenteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $date = Carbon::today()->toDateString();
        $ventes = Vente::where('ventes.created_at','LIKE', "%$date%")
            ->join('produits', 'ventes.produit_id', '=', 'produits.id')
            ->select('ventes.*', 'produits.nom as nom_produit')
            ->orderBy('ventes.created_at', 'desc')
            ->get();


        return view('vente.index', compact('ventes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $produits = Produit::orderBy('nom')->get();
        return view('vente.create', compact('produits'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $code_vente = $this->generateUniqueCode();
        foreach ($request->products as $product) {
            Vente::create([
                'nomclient' => $request->nom_client,
                'produit_id' => $product['id'],
                'code_vente' => $code_vente,
                'qte' =>  $product['quantity'],
                'prix_unitaire' => $product['unit_price'],
                'prix_total' => $product['total_price'],
            ]);
        }


        try {
            // Nom partagé de l'imprimante (configuré sur votre ordinateur)
            $connector = new \Mike42\Escpos\PrintConnectors\WindowsPrintConnector("POS-80");

            // Initialisation de l'imprimante
            $printer = new \Mike42\Escpos\Printer($connector);

            // Contenu à imprimer
            $printer->setTextSize(2,2);
            $printer->text("Boucherie TROIS R\n");
            $printer->setTextSize(1,1);
            $printer->text("Adresse : Num 540, Route Kipopo, Q\ Golf malela, V\ L'shi\n");
            $printer->setTextSize(2,2);
            $printer->text("------------------------\n");
            $printer->setTextSize(2, 2); // Taille du texte
            $printer->text("\n");
            $printer->text("Reçu de paiement\n");
            $printer->text("\n");
            $printer->setTextSize(1, 1);
            $printer->text("Client : ". $request->nom_client."\n");
            foreach ($request->products as $product) {
                $productName = $product['name'];
                $quantity = $product['quantity'];
                $unitPrice = $product['unit_price'];
                $total = $product['total_price'];

                $printer->text("Désignation : ". $productName ."\n");
                $printer->text( "Quantité : ".$quantity ." (kg) \n" );
                $printer->text( "Prix Unitaire : ".number_format( $unitPrice,2, ',',' ') ." CDF\n") ;
                $printer->text( "Total : ". number_format( $total, 2,',', ' ') ." CDF\n");
                $printer->text("-------------------------------------\n");
            }
            $totalCommande = str_replace(["\u{202F}", ','], ['', '.'], $request->totalCommande);
            $totalCommande = (float) $totalCommande;



            $printer->text("\n");
            $printer->text("Total à payer : ". number_format($totalCommande, 2, ',', ' ') ." CDF \n");
            $printer->text("\n");
            $printer->text("Date : " . date('d/m/Y') . "\n");
            $printer->text("-------------------------------------\n");
            $printer->text("Merci pour votre humble visite  !\n");
            $printer->feed(2); // Ajoute des espaces
            $printer->cut();

            // Ferme la connexion
            $printer->close();
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }

        return redirect()->route('vente.create');

    }

    /**
     * Display the specified resource.
     */
    public function show(Vente $vente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vente $vente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Vente $vente)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vente $vente)
    {
        //
    }

    public function statistiques()
    {
        $date = Carbon::today()->toDateString();
        $ventes = Vente::where('created_at','LIKE', "%$date%")->get();
        $prix_vente = 0;
        $nombre_vente = 0;
        $montant_jour = 0;
        $montant_semaine = 0;
        $ancien_code = null;

        foreach ($ventes as $vente){
            if($ancien_code == null){
                $ancien_code = $vente->code_vente;
                $nombre_vente += 1;
            }
            if($vente->code_vente != $ancien_code){
                $nombre_vente += 1;
                $ancien_code = $vente->code_vente;
            }
            $montant_jour += $vente->prix_total;
        }



        $ancien_code = null;

        $debutSemaine = Carbon::now()->startOfWeek()->toDateString();
        $finSemaine = Carbon::now()->endOfWeek()->toDateString();
        $nombreVenteSemaine = 0;

        $venteSemaine = Vente::whereBetween('created_at', [$debutSemaine, $finSemaine])->get();

        foreach ($venteSemaine as $venteS) {
            if($ancien_code == null){
                $ancien_code = $venteS->code_vente;
                $nombreVenteSemaine += 1;
            }
            if($venteS->code_vente != $ancien_code){
                $nombreVenteSemaine += 1;
                $ancien_code = $venteS->code_vente;
            }
            $montant_semaine += $venteS->prix_total;
        }
        $ancien_code = null;
        $debutMois = Carbon::now()->startOfMonth()->toDateString();
        $finMois = Carbon::now()->endOfMonth()->toDateString();
        $nombreVenteMois = 0;
        $montant_mois = 0;
        $venteMois = Vente::whereBetween('created_at', [$debutMois, $finMois])->get();
        foreach ($venteMois as $venteM) {
            if ($ancien_code == null){
                $ancien_code = $venteM->code_vente;
                $nombreVenteMois += 1;
            }
            if($venteM->code_vente != $ancien_code){
                $nombreVenteMois += 1;
                $ancien_code = $venteM->code_vente;
            }
            $montant_mois += $venteM->prix_total;
        }


        return view('vente.statistiques', compact('nombre_vente', 'montant_jour', 'montant_semaine', 'nombreVenteSemaine', 'montant_mois', 'nombreVenteMois' ));
    }

    public function generateUniqueCode()
    {
        do {
            $code = Str::random(4); // Génère une chaîne alphanumérique de 10 caractères
        } while (Vente::where('code_vente', $code)->exists()); // Tant que le code existe déjà, recommence

        return $code;
    }
}
