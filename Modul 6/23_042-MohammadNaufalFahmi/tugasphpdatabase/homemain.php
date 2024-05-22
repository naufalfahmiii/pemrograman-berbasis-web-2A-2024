<?php
session_start();

// Periksa apakah pengguna sudah login
if (!isset($_SESSION["username"])) {
    header("Location: index.php");
    exit();
}

$username = $_SESSION["username"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            background: rgb(2, 0, 36);
            background: linear-gradient(90deg, rgba(2, 0, 36, 1) 0%, rgba(111, 9, 121, 1) 17%, rgba(0, 212, 255, 1) 100%);
        }
        h2, p {
            color: white;
        }
    </style>
    <title>Home</title>
    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;700&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#ffffff" fill-opacity="1" d="M0,64L6.2,80C12.3,96,25,128,37,160C49.2,192,62,224,74,224C86.2,224,98,192,111,186.7C123.1,181,135,203,148,224C160,245,172,267,185,245.3C196.9,224,209,160,222,160C233.8,160,246,224,258,250.7C270.8,277,283,267,295,229.3C307.7,192,320,128,332,128C344.6,128,357,192,369,213.3C381.5,235,394,213,406,218.7C418.5,224,431,256,443,272C455.4,288,468,288,480,245.3C492.3,203,505,117,517,96C529.2,75,542,117,554,122.7C566.2,128,578,96,591,112C603.1,128,615,192,628,186.7C640,181,652,107,665,106.7C676.9,107,689,181,702,202.7C713.8,224,726,192,738,165.3C750.8,139,763,117,775,112C787.7,107,800,117,812,117.3C824.6,117,837,107,849,90.7C861.5,75,874,53,886,53.3C898.5,53,911,75,923,80C935.4,85,948,75,960,74.7C972.3,75,985,85,997,122.7C1009.2,160,1022,224,1034,224C1046.2,224,1058,160,1071,138.7C1083.1,117,1095,139,1108,144C1120,149,1132,139,1145,128C1156.9,117,1169,107,1182,138.7C1193.8,171,1206,245,1218,240C1230.8,235,1243,149,1255,117.3C1267.7,85,1280,107,1292,112C1304.6,117,1317,107,1329,112C1341.5,117,1354,139,1366,149.3C1378.5,160,1391,160,1403,186.7C1415.4,213,1428,267,1434,293.3L1440,320L1440,0L1433.8,0C1427.7,0,1415,0,1403,0C1390.8,0,1378,0,1366,0C1353.8,0,1342,0,1329,0C1316.9,0,1305,0,1292,0C1280,0,1268,0,1255,0C1243.1,0,1231,0,1218,0C1206.2,0,1194,0,1182,0C1169.2,0,1157,0,1145,0C1132.3,0,1120,0,1108,0C1095.4,0,1083,0,1071,0C1058.5,0,1046,0,1034,0C1021.5,0,1009,0,997,0C984.6,0,972,0,960,0C947.7,0,935,0,923,0C910.8,0,898,0,886,0C873.8,0,862,0,849,0C836.9,0,825,0,812,0C800,0,788,0,775,0C763.1,0,751,0,738,0C726.2,0,714,0,702,0C689.2,0,677,0,665,0C652.3,0,640,0,628,0C615.4,0,603,0,591,0C578.5,0,566,0,554,0C541.5,0,529,0,517,0C504.6,0,492,0,480,0C467.7,0,455,0,443,0C430.8,0,418,0,406,0C393.8,0,382,0,369,0C356.9,0,345,0,332,0C320,0,308,0,295,0C283.1,0,271,0,258,0C246.2,0,234,0,222,0C209.2,0,197,0,185,0C172.3,0,160,0,148,0C135.4,0,123,0,111,0C98.5,0,86,0,74,0C61.5,0,49,0,37,0C24.6,0,12,0,6,0L0,0Z"></path>
        </svg>
    </header>
    <div class="home-container">
        <div class="box">
            <h2>Selamat datang, <?php echo htmlspecialchars($username); ?></h2>
            <p>Ini adalah halaman home.</p>
            <div class="links">
                <a href="data.php">DATA MHS</a>
                <a href="logout.php">Logout</a>
            </div>
        </div>
    </div>
    <footer>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#ffffff" fill-opacity="1" d="M0,128L6.2,133.3C12.3,139,25,149,37,181.3C49.2,213,62,267,74,240C86.2,213,98,107,111,64C123.1,21,135,43,148,53.3C160,64,172,64,185,96C196.9,128,209,192,222,197.3C233.8,203,246,149,258,138.7C270.8,128,283,160,295,181.3C307.7,203,320,213,332,213.3C344.6,213,357,203,369,165.3C381.5,128,394,64,406,37.3C418.5,11,431,21,443,48C455.4,75,468,117,480,165.3C492.3,213,505,267,517,245.3C529.2,224,542,128,554,90.7C566.2,53,578,75,591,101.3C603.1,128,615,160,628,149.3C640,139,652,85,665,96C676.9,107,689,181,702,186.7C713.8,192,726,128,738,133.3C750.8,139,763,213,775,256C787.7,299,800,309,812,304C824.6,299,837,277,849,277.3C861.5,277,874,299,886,304C898.5,309,911,299,923,256C935.4,213,948,139,960,133.3C972.3,128,985,192,997,208C1009.2,224,1022,192,1034,165.3C1046.2,139,1058,117,1071,101.3C1083.1,85,1095,75,1108,80C1120,85,1132,107,1145,96C1156.9,85,1169,43,1182,37.3C1193.8,32,1206,64,1218,74.7C1230.8,85,1243,75,1255,80C1267.7,85,1280,107,1292,144C1304.6,181,1317,235,1329,256C1341.5,277,1354,267,1366,250.7C1378.5,235,1391,213,1403,181.3C1415.4,149,1428,107,1434,85.3L1440,64L1440,320L1433.8,320C1427.7,320,1415,320,1403,320C1390.8,320,1378,320,1366,320C1353.8,320,1342,320,1329,320C1316.9,320,1305,320,1292,320C1280,320,1268,320,1255,320C1243.1,320,1231,320,1218,320C1206.2,320,1194,320,1182,320C1169.2,320,1157,320,1145,320C1132.3,320,1120,320,1108,320C1095.4,320,1083,320,1071,320C1058.5,320,1046,320,1034,320C1021.5,320,1009,320,997,320C984.6,320,972,320,960,320C947.7,320,935,320,923,320C910.8,320,898,320,886,320C873.8,320,862,320,849,320C836.9,320,825,320,812,320C800,320,788,320,775,320C763.1,320,751,320,738,320C726.2,320,714,320,702,320C689.2,320,677,320,665,320C652.3,320,640,320,628,320C615.4,320,603,320,591,320C578.5,320,566,320,554,320C541.5,320,529,320,517,320C504.6,320,492,320,480,320C467.7,320,455,320,443,320C430.8,320,418,320,406,320C393.8,320,382,320,369,320C356.9,320,345,320,332,320C320,320,308,320,295,320C283.1,320,271,320,258,320C246.2,320,234,320,222,320C209.2,320,197,320,185,320C172.3,320,160,320,148,320C135.4,320,123,320,111,320C98.5,320,86,320,74,320C61.5,320,49,320,37,320C24.6,320,12,320,6,320L0,320Z"></path>
        </svg>
    </footer>
</body>
</html>
