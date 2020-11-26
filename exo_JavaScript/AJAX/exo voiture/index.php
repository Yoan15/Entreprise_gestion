<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
</head>
<body>
    Marque : <select name="marque" id="marque">
                <option value="">Sélectionner une marque</option>
                <option value="TOYOTA">TOYOTA</option>
                <option value="BMW">BMW</option>
                <option value="CHEVROLET">CHEVROLET</option>
            </select></br>
    Modèle : <select name="modele" id="modele">
                <option value="">Sélectionner un modèle</option>
            </select></br>

            <div>
                <table id="table-voiture" border = 1>
                    <thead>
                        <tr>
                            <th>Marque</th>
                            <th>Modèle</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                    </tbody>
                </table>
            </div>
</body>
<script src="jquery-3.5.1.min.js"></script>
<script src="scriptVoiture.js" type="text/javascript"></script>
</html>