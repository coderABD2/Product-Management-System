<?php
include "db.php";
session_start();
if(isset($_GET['id'])){
 $id=$_GET['id'];
 
 $sql=$conn->prepare("select*from menu where id=?");
 $sql->bind_param('i',$id);
 $sql->execute();
 $user=$sql->get_result()->fetch_assoc();
if($_SERVER['REQUEST_METHOD']==="POST"){
    $image=$_FILES["image"]["name"];
    $name=$_POST['name'];
    $disc=$_POST['disc'];
    $price=$_POST['price'];
    $category=$_POST['category'];
    move_uploaded_file($_FILES["image"]["tmp_name"],"upload/.$image");
    $sql=$conn->prepare("update  menu set image=?,name=?,disc=?,price=?,category=? where id=?");
    $sql->bind_param('sssisi',$image,$name,$disc,$price,$category,$id);
    if($sql->execute()){
        header("location:homes.php");
    }
}

}

?>
<!doctype html>
<html lang="en" data-bs-theme="light">
    <head>
        <title>Title</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <!-- Bootstrap CSS v5.3.8 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB"
            crossorigin="anonymous"
        />
    </head>

    <body>
        <header>
            <!-- place navbar here -->
        </header>
        <main>
            <h1 class="text-center">Add product</h1>
            <div
                class="container col-4 border rounded shadow p-4 my-5"
            >
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="" class="form-label">Choose file</label>
                        <input
                            type="file"
                            class="form-control"
                            name="image"
                            id=""
                            placeholder=""
                            aria-describedby="fileHelpId"
                        />
                    
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">item name</label>
                        <input
                            type="text"
                            class="form-control"
                            name="name"
                            id=""
                            value="<?=$user['name']?>"
                            aria-describedby="helpId"
                            placeholder=""
                        />
                      
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Description</label>
                        <textarea class="form-control" name="disc" id="" rows="3" ><?=$user['disc']?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">price</label>
                        <input
                            type="number"
                            class="form-control"
                            name="price"
                            id=""
                            value="<?=$user['price']?>"
                            aria-describedby="helpId"
                            placeholder=""
                        />
                      
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">category</label>
                        <input
                            type="text"
                            class="form-control"
                            name="category"
                            id=""
                            value="<?=$user['category']?>"
                            aria-describedby="helpId"
                            placeholder=""
                        />
                      
                    </div>
                    
                    <button
                        type="submit"
                        class="btn btn-primary"
                    >
                        Submit
                    </button>
                    
                    <a
                        name=""
                        id=""
                        class="btn btn-primary"
                        href="homes.php"
                        role="button"
                        >Cancel</a
                    >
                    
                    
                    
                </form>
            </div>
            
        </main>
        <footer>
            <!-- place footer here -->
        </footer>
        <!-- Bootstrap JavaScript Bundle (includes Popper) -->
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
            crossorigin="anonymous"
        ></script>
    </body>
</html>
