<?php
include "db.php";
session_start();
$result=$conn->query("select*from menu");
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
        <style>
            .img-fluid{
              height: 50px;
              width: 50px;
            }
        </style>
    </head>

    <body>
        <header>
            <!-- place navbar here -->
        </header>
        <main>
            <h1 class="text-center">Menu..</h1>
            <div
                class="container my-5"
            >
                <div
                    class="table-responsive"
                >
                    <table
                        class="table table-primary"
                    >
                        <thead>
                            
                            <tr>
                                <th scope="col">id</th>
                                <th scope="col">image</th>
                                <th scope="col">item name</th>
                                <th scope="col">description</th>
                                <th scope="col">price</th>
                                <th scope="col">category</th>
                                <th scope="col">Action</th>
                                <th scope="col">Actionn</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while($row=$result->fetch_assoc()){?>
                            <tr class="">
                                <td scope="row"><?=$row['id']?></td>
                                <td><img
                                    src="upload/.<?=$row['image']?>"
                                    class="img-fluid rounded-top"
                                    alt=""
                                />
                                </td>
                                <td><?=$row['name']?></td>
                                <td><?=$row['disc']?></td>
                                <td scope="row"><?=$row['price']?></td>
                                <td scope="row"><?=$row['category']?></td>
                                <td><a href="edit.php?id=<?=$row['id']?>">Edit</a></td>
                                <td><a href="delete.php?id=<?=$row['id']?>">Delete</a></td>
                            </tr>
                         
                        </tbody>
                    <?php } ?>
                    </table>
                </div>
                
            </div>
           
            
          <center>  <a
                name=""
                id=""
                class="btn btn-primary"
                href="homes.php"
                role="button"
                >Back</a
            ></center>
            
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
