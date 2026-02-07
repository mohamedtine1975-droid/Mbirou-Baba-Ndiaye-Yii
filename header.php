<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $pageTitle ?? 'Mon Site'; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        
        html, body {
            height: 100%;
            margin: 0;
        }
        
        
        body {
            display: flex;
            flex-direction: column;
        }
        
        
        main {
            flex: 1 0 auto;
        }
        
       
        footer {
            flex-shrink: 0;
        }
        h1 {
            margin-top: 80px;
            text-align: center;
        }
    </style>
</head>
<body>