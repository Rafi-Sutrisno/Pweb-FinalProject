<?php
    include("config.php");

    if (isset($_POST['post-movie'])){
        $title = $_POST['title'];
        $desc = $_POST['description'];
        $duration = $_POST['duration'];
        $timestamp = time();
        $releasedate = gmdate('Y-m-d', $timestamp);
    
        $foto_poster = $_FILES['foto-poster']['name'];
        $tmp = $_FILES['foto-poster']['tmp_name'];

        $foto_bg = $_FILES['foto-bg']['name'];
        $tmp2 = $_FILES['foto-bg']['tmp_name'];

        $foto_posterbaru = date('dmYHis').$foto_poster;
        $foto_bgbaru = date('dmYHis').$foto_bg;

        $path1 = "./source/images/".$foto_posterbaru;
        $path2 = "./source/images/".$foto_bgbaru;

        if (move_uploaded_file($tmp, $path1) and move_uploaded_file($tmp2, $path2)){
            $sql = "INSERT INTO movies (M_Title, M_Description, M_Duration, M_ReleaseDate, M_Poster, M_Background) 
                VALUE ('$title', '$desc', '$duration', '$releasedate', '$foto_posterbaru', '$foto_bgbaru')";

            $query = mysqli_query($db, $sql);

            if ($query){
                header('Location: index.php?status=berhasil');
            } else {
                header('Location: index.php?status=gagal');
            }
        }
        
    } else{
        die("Akses dilarang...");
    }
?>