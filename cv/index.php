<?php
// Set file path
$pdfFile = './cv.pdf';

// Handle download if triggered
if (isset($_GET['download'])) {
    $filePath = $pdfFile;
    $fileName = basename($filePath);

    if (file_exists($filePath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/pdf');
        header('Content-Disposition: attachment; filename="' . 'CV-TusharNeje' . '"');
        header('Content-Length: ' . filesize($filePath));
        flush();
        readfile($filePath);
        exit;
    } else {
        die('File not found.');
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>View and Download PDF</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            overflow: hidden;
        }
        iframe {
            width: 100vw;
            height: 100vh;
            border: none;
        }
        .download-btn {
            position: absolute;
            top: 10px;
            right: 10px;
            background-color: #007BFF;
            color: white;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            z-index: 1000;
        }
    </style>
</head>
<body>

<a class="download-btn" href="?download=1">Download CV</a>

<iframe src="<?php echo htmlspecialchars($pdfFile); ?>#zoom=100" type="application/pdf">
    This browser does not support inline PDFs. <a href="<?php echo htmlspecialchars($pdfFile); ?>">Click here to view the PDF</a>.
</iframe>

</body>
</html>
