<?php include "assest/head.php"; ?>

<!-- JS TextEditor -->
<link href="css/footer.css" rel="stylesheet">

<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

<title>Add Article</title>
</head>

<body>

    <!-- Header -->
    <header class="blog-header">
        <div class="d-flex flex-column flex-md-row align-items-center p-1 px-md-4 bg-white border-bottom shadow-sm">
            <a href="index.php" class="my-0 mr-md-auto" style="width: 6rem;">
                <img src="img/logo/logo.png" alt="dev culture logo" style="width: 100%;height: auto;">
            </a>

            <nav class="my-2 my-md-0 mr-md-3">
                <a class="p-2 px-5 text-muted" href="index.php">Home</a>
                <a class="p-2 px-5 text-muted" href="categories.php">Category</a>
                <a class="p-2 px-5 text-muted" href="article.php">Article</a>
                <!-- <a class="p-2 px-5 text-muted" href="single_article.php">Single Article</a> -->
                <a class="p-2 px-5 text-muted" href="autheur.php">Autheur</a>
            </nav>

            <a class="btn btn-outline-primary" href="#">Sign up</a>
        </div>

        <div class="jumbotron text-center mb-0">
            <h1 class="display-3 font-weight-normal text-muted">All Articles</h1>
            <!-- <p class="h4 text-black">Home > Add Article</p> -->
        </div>

    </header>

    <!-- Main -->
    <main role="main" class="px-4">

        <div class="row">
            <table class='table table-striped table-bordered'>

                <thead class='thead-dark'>
                    <tr>
                        <th scope='col'>ID</th>
                        <th scope='col'>Title</th>
                        <th scope='col'>Content</th>
                        <th scope='col'>Image</th>
                        <th scope='col'>Created Time</th>
                        <th scope='col'>Category</th>
                        <th scope='col'>Autheur</th>
                        <th scope='col' colspan="3">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    $data = $conn->query("SELECT * FROM article, autheur, category WHERE id_categorie = category_id AND autheur_id = id_autheur ORDER BY article_id ASC")->fetchAll();
                    foreach ($data as $row) {
                        echo "<tr>";
                    ?>

                        <td><?= $row['article_id'] ?></td>
                        <td><?= $row['article_title'] ?></td>
                        <td class="text-break"><?= strip_tags(substr($row['article_content'], 0, 40)) . "..." ?></td>
                        <td><img src="img/article/<?= $row['article_image'] ?>" style="width: 100px; height: auto;"></td>
                        <td><?= $row['article_created_time'] ?></td>
                        <td><?= $row['category_name'] ?></td>
                        <td><?= $row['autheur_fullname'] ?></td>

                        <td>
                            <a class="btn btn-info" href="single_article.php?id=<?= $row['article_id'] ?> ">
                                <i class="fa fa-eye" aria-hidden="true"></i>
                            </a>
                        </td>
                        <td>
                            <a class="btn btn-success" href="update_article.php?id=<?= $row['article_id'] ?> ">
                                <i class="fa fa-pencil " aria-hidden="true"></i>
                            </a>
                        </td>
                        <td>
                            <a class="btn btn-danger" href="assest/delete.php?type=article&id=<?= $row['article_id'] ?> ">
                                <i class="fa fa-trash " aria-hidden="true"></i>
                            </a>
                        </td>

                    <?php
                        echo "</tr>";
                    }
                    ?>
                </tbody>

            </table>
        </div>

        <div class="row ">

            <div class="col-lg-12 text-center mb-3">
                <a class="btn btn-info" href="add_article.php">Add Article</a>
            </div>

        </div>

    </main><!-- /.container -->

    <!-- Footer -->
    <?php include "assest/footer.php" ?>


</body>

</html>