<header>
        <nav>

        <?php if(!isset($_SESSION["user"])): ?>
            <a class="nav" href="/register">Register</a>
            <?php endif; ?>

            <?php if(!isset($_SESSION["user"])): ?>
            <a class="nav" href="/">Log In</a>
            <?php endif; ?>
            
            <a class="nav" href="/books">Books</a>

            <a class="nav" href="/create-books">Uztaisi gramatu</a>


            <a class="nav" href="/borrowed-books">Borrowed Books</a>    

                <?php if(isset($_SESSION["username"])): ?>
            <a class="nav" href="/logout">Log Out</a>
                <?php endif; ?>

    </nav>
</header>