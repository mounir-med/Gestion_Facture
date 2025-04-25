<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Factures</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            flex-wrap: wrap;
        }

        h1 {
            margin-top: 20px;
            margin-right: 20px; /* Décalage vers la gauche */
        }

        .facture-details {
            margin-top: 20px;
            margin-left: 400px; /* Décalage vers la droite */
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table th, table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        table th {
            background-color: #3846c6;
            color: white;
        }



        @media only screen and (max-width: 600px) {
            table {
                border: 0;
            }
            table thead {
                display: none;
            }
            table tbody td {
                display: block;
                padding: 8px;
                border-bottom: 1px solid #ddd;
            }
            table tbody td::before {
                content: attr(data-label);
                font-weight: bold;
                display: block;
            }
        }
        footer {
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
            background-color: #f4f4f4;
            text-align: center;
            padding: 20px 0; /* Ajoute un peu d'espace autour du texte du footer */
            border-top: 1px solid #ddd; /* Ajoute une ligne supérieure pour séparer le footer du contenu */
        }

    </style>
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h1 style="color: blue;font-size:20px">Listes Des Factures</h1>
            <div class="facture-details">
                @foreach($products as $product)
                <p><span style="color: blue;">Facture N°</span> : {{ $product->id }}</p>
                <p><span style="color: blue;">Date de facture </span> : {{ $product->date_de_facture }}</p>
                <p><span style="color: blue;">Mode de paiement</span> : {{ $product->etat }}</p>
                @endforeach
            </div>
        </div>
    </div>
</div>

<table>
    <thead>
        <tr>
            <th>Nom</th>
            <th>Titre</th>
            <th>État</th> <!-- Nouvelle colonne pour l'état -->
        </tr>
    </thead>
    <tbody>
        @foreach($products as $product)
        <tr>
            <td>{{ $product->name }}</td>
            <td>{{ $product->title }}</td>
            <td>{{ $product->etat }}</td> <!-- Affichage de l'état -->
        </tr>
        @endforeach
    </tbody>
</table>

<table>
    <thead>
        <th>Description</th>
        <th>Quantité</th>
        <th>Prix Unitaire</th>
        <th>Prix Total</th>
    </thead>
    <tbody>
        <td>{{ $product->description }}</td>
        <td>{{ $product->quantite }}</td>
        <td>{{ $product->price_uni }}</td>
        <td>{{ $product->price_total }}</td>
    </tbody>
</table>

<footer style="margin-top: 20px;">
    <p>
        Des questions? <br>
        Envoyez-nous un e-mail à GDF@gmail.com ou appelez-nous au +212690567890
        <hr style="border-color: blue;">
        Rue 7 N°5 Etage Saada Sidi Bernoussi
    </p>
</footer>



</body>
</html>
