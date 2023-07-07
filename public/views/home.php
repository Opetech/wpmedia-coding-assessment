<?php
$meta_title = "Index";
include 'header.php';
?>
<section>
    <div class="container">
        <div class="bg-light p-5 rounded">
            <h2>JSONPlaceholder Posts</h2>
            <?php if (isset($_SESSION['error']))
                echo '<h5>' . $_SESSION['message'] . '</h5>'
            ?>
            <?php if (isset($posts)) : ?>
                <ul class="list-group list-group-flush">
                    <?php foreach ($posts as $post) : ?>
                        <li class="list-group-item"><a class="text-decoration-none" href="https://jsonplaceholder.typicode.com/posts/<?php echo $post['id']; ?>"><?php echo $post['title']; ?></a></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
        </div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>
</html>
