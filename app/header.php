
    <div>
        <div>
        <nav class="flex justify-center ">
            <a href="/hwork13.php" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 mx-4">home work 13</a>
            <a href="/about.php" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 mx-4">about</a>
            <a href="/index.php" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 mx-4">index</a>
            <a href="/login.php" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 mx-4">Log in</a>
        </nav>
        </div>
        <div class="flex justify-end">
            <?php 
                if (!empty($_SESSION['name'])) { ?>
                    <div class="flex flex-col">
                        <h3 class="text-2xl text-gray-900 dark:text-white bg-blue-700 my-0.5">Logged in</h3>
                        <form action="./login.php" method="post">
                            <input type="hidden" name="logout" id="true">
                            <input type="submit" value="logout" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700 my-0.5">
                        </form>
                    </div>
            <?php } else { ?>
                    <h3 class="text-2xl text-gray-900 dark:text-white bg-blue-700 sm:mr-5">Logged out</h3>
            <? } ?>
        </div>
    </div>


