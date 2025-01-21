<?php
session_start();
include('./admin/connection.php');
$data = [];
$sql = "select * from lessons";
$res = $con->query($sql);
if ($res->num_rows > 0) {
    while ($row = $res->fetch_assoc()) {
        $data[] = $row;
    }
}
?>

<?php require_once 'header.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Font Awesome -->
    <link
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        rel="stylesheet" />
    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
        rel="stylesheet" />
    <!-- MDB -->
    <link
        href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/8.1.0/mdb.min.css"
        rel="stylesheet" />
        <style>
        body {
            font-family: Georgia, 'Times New Roman', Times, serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }
        h1 {
            text-align: center;
            color: black;
            margin: 40px 0;
            font-size: 2.5rem;
            text-transform: uppercase;
        }
        h1 .fa-om {
            color: #ff5722;
            margin: 0 10px;
        }
        .row {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 20px;
            margin: 20px auto;
            max-width: 90%;
            width: 100%;
        }
        .quotecard {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            padding: 20px;
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            text-align: left;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .quotecard:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3);
        }
        .quotecard img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            border: 2px solid #444;
            margin-right: 20px;
            flex-shrink: 0;
        }
        .quotecard {
            flex: 1;
            font-size: 1.1rem;
            color: black;
            font-family: Georgia, 'Times New Roman', Times, serif;
            line-height: 1.6;
        }
        .quotecard-body {
            font-size: 1rem;
            color: #777;
            font-weight: bold;
            margin-left: 20px;
            text-align: right;
            white-space: nowrap;
            font-style: italic;
        }
    </style>
</head>
<section class="temples-header">
    <h1><b><i class="fa-solid fa-om"></i>Life Lessons<i class="fa-solid fa-om"></i></b></h1>
    <div class="row">
        <?php
        $i = 0;
        foreach ($data as $row) {
            $i++;
        ?>
            <div class="quotecard">
                <img src="images/black-1.webp" alt="Avatar" style="width:50px;height:50px;border-radius: 50%;border:2px solid black">"<?php echo $row["quote"]; ?>"
                <div class="quotecard-body">
                    <P> - <?php echo $row["source"]; ?></P>

                </div>
            </div>

        <?php } ?>
    </div>
</section>
<?php require_once 'footer.php'; ?>

<!-- MDB -->
<script
    type="text/javascript"
    src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/8.1.0/mdb.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>