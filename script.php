<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="subpixel-antialiased font-Montserrat ">
<nav class="sticky top-0 h-20 bg-[#243c5a] p-5 sm:px-24 xl:px-64">
    <div class="mx-auto flex justify-between items-center">
        <a href="#"
           class="uppercase text-white text-xl xl:text-3xl font-bold whitespace-no-wrap font-Montserrat leading-normal tracking-tighter">Start
            Tailwind</a>
        <button class="block md:hidden uppercase inline-flex items-center bg-green-500 px-3 py-2 rounded-lg text-white">Menu <svg class="h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z"/></svg></button>
        <div class="hidden md:block">
            <a href="" class="px-4 uppercase text-white text-base font-bold whitespace-no-wrap font-Montserrat leading-normal tracking-tighter hover:text-green-500">Portfolio</a>
            <a href="" class="px-4 uppercase text-white text-base font-bold whitespace-no-wrap font-Montserrat leading-normal tracking-tighter hover:text-green-500">About</a>
            <a href="" class="px-4 uppercase text-white text-base font-bold whitespace-no-wrap font-Montserrat leading-normal tracking-tighter hover:text-green-500">Contact</a>
        </div>
    </div>
</nav>
<>
    <section class="bg-green-500 py-32 ">
        <figure class="container px-16 pt-12 mx-auto">
            <img class="mb-12 h-64 mx-auto" src="https://francescomansi.me/img/start-tailwind/avataaars.svg" alt="">
        </figure>
        <h1 class="text-center uppercase text-white text-5xl lg:text-6xl font-bold  leading-none tracking-normal">
            Start
            Tailwind
        </h1>
        <div class="flex flex-row items-center justify-center py-4">
            <span class="h-1 w-24 bg-white rounded-full mx-2"></span>
            <svg class="h-12 fill-current text-white " xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                <path
                        d="M6.1 21.98a1 1 0 0 1-1.45-1.06l1.03-6.03-4.38-4.26a1 1 0 0 1 .56-1.71l6.05-.88 2.7-5.48a1 1 0 0 1 1.8 0l2.7 5.48 6.06.88a1 1 0 0 1 .55 1.7l-4.38 4.27 1.04 6.03a1 1 0 0 1-1.46 1.06l-5.4-2.85-5.42 2.85zm4.95-4.87a1 1 0 0 1 .93 0l4.08 2.15-.78-4.55a1 1 0 0 1 .29-.88l3.3-3.22-4.56-.67a1 1 0 0 1-.76-.54l-2.04-4.14L9.47 9.4a1 1 0 0 1-.75.54l-4.57.67 3.3 3.22a1 1 0 0 1 .3.88l-.79 4.55 4.09-2.15z"/>
            </svg>
            <span class="h-1 w-24 bg-white rounded-full mx-2"></span>
        </div>
        <p class="px-12 text-center text-white text-xl font-normal font-sans">Graphic Artist - Web Designer -
            Illustrator</p>
    </section>

    <section class="bg-white -mt-12 py-16">
        <div class="flex items-center justify-center min-h-screen grid lg:grid-cols-3 md:grid-cols-2 sm:grid-cols-1">
            <?php
            class House {
                public $price;
                public $name;
                public $address;
                public $contact_phone;
                public $image_url;
                public $bedrooms;
                public $bathrooms;

                public function __construct($price, $name, $address, $contact_phone, $image_url, $bedrooms, $bathrooms) {
                    $this->price = $price;
                    $this->name = $name;
                    $this->address = $address;
                    $this->contact_phone = $contact_phone;
                    $this->image_url = $image_url;
                    $this->bedrooms = $bedrooms;
                    $this->bathrooms = $bathrooms;
                }
            }


                function generateHouses() {
                    $count = isset($_GET['houses']) ? intval($_GET['houses']) : 4;

                    // Підключення до бази даних
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "mysite";

                    $conn = mysqli_connect($servername, $username, $password, $dbname);

                    // Перевірка підключення
                    if (!$conn) {
                        die("Connection failed: " . mysqli_connect_error());
                    }

                    // SQL запит для вибору будинків з бази даних
                    $sql = "SELECT * FROM houses LIMIT $count";
                    $result = mysqli_query($conn, $sql);

                    $houses = [];
                    // Обробка результату запиту
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $houses[] = new House(
                                $row['price'],
                                $row['name'],
                                $row['address'],
                                $row['contact_phone'],
                                $row['image_url'],
                                $row['bedrooms'],
                                $row['bathrooms']
                            );
                        }
                    }

                    // Закриття з'єднання з базою даних
                    mysqli_close($conn);

                    return $houses;


            }

            // Виклик функції generateHouses()
            $houses = generateHouses();


            $houses = generateHouses();

        // Виведення атрибутів об'єктів hou
            function calculateDiscount() {
                $isOnSale = rand(0, 1); // 0 - не під акцією, 1 - під акцією
                $discountPercentage = rand(0, 30); // відсоток знижки (0-30%)
                return [$isOnSale, $discountPercentage];
            }

            foreach ($houses as $house) {
                list($isOnSale, $discountPercentage) = calculateDiscount();

                echo "<div class='max-w-sm w-full py-6 px-3'>";
                echo "<div class='bg-white shadow-xl rounded-lg overflow-hidden'>";
                echo "<div class='bg-cover bg-center h-56 p-4' style='background-image: url(" . $house->image_url . ")'>";
                echo "<div class='flex justify-end'>";
                echo "<svg class='h-6 w-6 text-white fill-current' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24'>";
                echo "<path d='M12.76 3.76a6 6 0 0 1 8.48 8.48l-8.53 8.54a1 1 0 0 1-1.42 0l-8.53-8.54a6 6 0 0 1 8.48-8.48l.76.75.76-.75zm7.07 7.07a4 4 0 1 0-5.66-5.66l-1.46 1.47a1 1 0 0 1-1.42 0L9.83 5.17a4 4 0 1 0-5.66 5.66L12 18.66l7.83-7.83z'></path>";
                echo "</svg>";
                echo "</div>";
                echo "</div>";
                echo "<div class='p-4'>";
                echo "<p class='uppercase tracking-wide text-sm font-bold text-gray-700'>" . $house->name . "</p>";

                if ($isOnSale) {
                    $price = floatval(str_replace(',', '', substr($house->price, 1))); // конвертуємо ціну у числове значення
                    $discountedPrice = $price - ($price * ($discountPercentage / 100));
                    echo "<p class='text-3xl text-red-600 font-bold'>" . number_format($discountedPrice, 2) . "</p>";
                    echo "<p class='text-gray-900 line-through'>" . $house->price . "</p>";
                } else {
                    echo "<p class='text-3xl text-gray-900'>" . $house->price . "</p>";
                }

                echo "<p class='text-gray-700'>" . $house->address . "</p>";
                echo "</div>";
                echo "<div class='flex p-4 border-t border-gray-300 text-gray-700'>";
                echo "<div class='flex-1 inline-flex items-center'>";
                echo "<svg class='h-6 w-6 text-gray-600 fill-current mr-3' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24'>";
                echo "<path d='M0 16L3 5V1a1 1 0 0 1 1-1h16a1 1 0 0 1 1 1v4l3 11v5a1 1 0 0 1-1 1v2h-1v-2H2v2H1v-2a1 1 0 0 1-1-1v-5zM19 5h1V1H4v4h1V4a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v1h2V4a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v1zm0 1v2a1 1 0 0 1-1 1h-4a1 1 0 0 1-1-1V6h-2v2a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1V6H3.76L1.04 16h21.92L20.24 6H19zM1 17v4h22v-4H1zM6 4v4h4V4H6zm8 0v4h4V4h-4z'></path>";
                echo "</svg>";
                echo "<p><span class='text-gray-900 font-bold'>" . $house->bedrooms . "</span> Кімнати</p>";
                echo "</div>";
                echo "<div class='flex-1 inline-flex items-center'>";
                echo "<svg class='h-6 w-6 text-gray-600 fill-current mr-3' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24'>";
                echo "<path fill-rule='evenodd' d='M17.03 21H7.97a4 4 0 0 1-1.3-.22l-1.22 2.44-.9-.44 1.22-2.44a4 4 00 0 1-1.42 0L9.83 5.17a4 4 0 1 0-5.66 5.66L12 18.66l7.83-7.83z'></path>";
                echo "</svg>";
                echo "<p><span class='text-gray-900 font-bold'>" . $house->bathrooms . "</span> Ванні кімнати</p>";
                echo "</div>";
                echo "</div>";
                echo "<div class='px-4 pt-3 pb-4 border-t border-gray-300 bg-gray-100'>";
                echo "<div class='text-xs uppercase font-bold text-gray-600 tracking-wide'>Realtor</div>";
                echo "<div class='flex items-center pt-2'>";
                echo "<div class='bg-cover bg-center w-10 h-10 rounded-full mr-3' style='background-image: url(https://images.unsplash.com/photo-0522144261-ea64433bbe27?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=751&q=80)'></div>";
                echo "<div>";
                echo "<p class='font-bold text-gray-900'>Tiffany Heffner</p>";
                echo "<p class='text-sm text-gray-700'>(555) 555-4321</p>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
            }
            ?>
        </div>

    <h1 class="text-center uppercase text-black text-4xl font-bold  leading-none tracking-normal">
            Portfolio
        </h1>
        <div class="flex flex-row items-center justify-center py-4">
            <span class="h-1 w-24 bg-black rounded-full mx-2"></span>
            <svg class="h-12 fill-current text-black " xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                <path
                        d="M6.1 21.98a1 1 0 0 1-1.45-1.06l1.03-6.03-4.38-4.26a1 1 0 0 1 .56-1.71l6.05-.88 2.7-5.48a1 1 0 0 1 1.8 0l2.7 5.48 6.06.88a1 1 0 0 1 .55 1.7l-4.38 4.27 1.04 6.03a1 1 0 0 1-1.46 1.06l-5.4-2.85-5.42 2.85zm4.95-4.87a1 1 0 0 1 .93 0l4.08 2.15-.78-4.55a1 1 0 0 1 .29-.88l3.3-3.22-4.56-.67a1 1 0 0 1-.76-.54l-2.04-4.14L9.47 9.4a1 1 0 0 1-.75.54l-4.57.67 3.3 3.22a1 1 0 0 1 .3.88l-.79 4.55 4.09-2.15z"/>
            </svg>
            <span class="h-1 w-24 bg-black rounded-full mx-2"></span>
        </div>
        <div class="flex flex-col sm:flex-row sm:flex-wrap px-6 max-w-md md:max-w-6xl mx-auto">
            <div class="w-full sm:w-1/2 md:w-1/3 p-4 rounded-lg">
                <img alt="" class="rounded-lg" src="https://francescomansi.me/img/start-tailwind/portfolio/cabin.png">
            </div>
            <div class="w-full sm:w-1/2 md:w-1/3 p-4">
                <img alt="" class="rounded-lg" src="https://francescomansi.me/img/start-tailwind/portfolio/cake.png">
            </div>
            <div class="w-full sm:w-1/2 md:w-1/3 p-4">
                <img alt="" class="rounded-lg" src="https://francescomansi.me/img/start-tailwind/portfolio/circus.png">
            </div>
            <div class="w-full sm:w-1/2 md:w-1/3 p-4">
                <img alt="" class="rounded-lg" src="https://francescomansi.me/img/start-tailwind/portfolio/game.png">
            </div>
            <div class="w-full sm:w-1/2 md:w-1/3 p-4">
                <img alt="" class="rounded-lg" src="https://francescomansi.me/img/start-tailwind/portfolio/safe.png">
            </div>
            <div class="w-full sm:w-1/2 md:w-1/3 p-4">
                <img alt="" class="rounded-lg" src="https://francescomansi.me/img/start-tailwind/portfolio/submarine.png">
            </div>
        </div>
    </section>
    <section class="bg-green-500 -mt-12 py-16">
        <h1 class="text-center uppercase text-white text-4xl font-bold  leading-none tracking-normal">
            About
        </h1>
        <div class="flex flex-row items-center justify-center py-4">
            <span class="h-1 w-24 bg-white rounded-full mx-2"></span>
            <svg class="h-12 fill-current text-white " xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                <path
                        d="M6.1 21.98a1 1 0 0 1-1.45-1.06l1.03-6.03-4.38-4.26a1 1 0 0 1 .56-1.71l6.05-.88 2.7-5.48a1 1 0 0 1 1.8 0l2.7 5.48 6.06.88a1 1 0 0 1 .55 1.7l-4.38 4.27 1.04 6.03a1 1 0 0 1-1.46 1.06l-5.4-2.85-5.42 2.85zm4.95-4.87a1 1 0 0 1 .93 0l4.08 2.15-.78-4.55a1 1 0 0 1 .29-.88l3.3-3.22-4.56-.67a1 1 0 0 1-.76-.54l-2.04-4.14L9.47 9.4a1 1 0 0 1-.75.54l-4.57.67 3.3 3.22a1 1 0 0 1 .3.88l-.79 4.55 4.09-2.15z"/>
            </svg>
            <span class="h-1 w-24 bg-white rounded-full mx-2"></span>
        </div>
        <div class="flex flex-col lg:flex-row max-w-lg md:max-w-2xl lg:max-w-3xl mx-auto">
            <div class="mx-6 text-white text-xl py-4">Freelancer is a free tailwind css theme created from Freelancer theme by Start Bootstrap.
                The entire template was written using only the default configuration file.
            </div>
            <div class="mx-6 text-white text-xl py-4">
                You can create your own custom avatar for the masthead, change the icon in the dividers, and add your email
                address to the contact form to make it fully functional!</div>
        </div>
        <div class="flex justify-center py-8">
            <button class="bg-transparent hover:bg-white hover:text-black text-white border-2 border-white font-normal py-3 px-5 rounded-lg inline-flex items-center">
                <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <path d="M13 8V2H7v6H2l8 8 8-8h-5zM0 18h20v2H0v-2z"/>
                </svg>
                <span>Free Download!</span>
            </button>
        </div>
    </section>


<section class="bg-white -mt-12 py-16">
    <h1 class="text-center uppercase text-black text-4xl font-bold  leading-none tracking-normal">
        Contact Me
    </h1>
    <div class="flex flex-row items-center justify-center py-4">
        <span class="h-1 w-24 bg-black rounded-full mx-2"></span>
        <svg class="h-12 fill-current text-black" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
            <path
                    d="M6.1 21.98a1 1 0 0 1-1.45-1.06l1.03-6.03-4.38-4.26a1 1 0 0 1 .56-1.71l6.05-.88 2.7-5.48a1 1 0 0 1 1.8 0l2.7 5.48 6.06.88a1 1 0 0 1 .55 1.7l-4.38 4.27 1.04 6.03a1 1 0 0 1-1.46 1.06l-5.4-2.85-5.42 2.85zm4.95-4.87a1 1 0 0 1 .93 0l4.08 2.15-.78-4.55a1 1 0 0 1 .29-.88l3.3-3.22-4.56-.67a1 1 0 0 1-.76-.54l-2.04-4.14L9.47 9.4a1 1 0 0 1-.75.54l-4.57.67 3.3 3.22a1 1 0 0 1 .3.88l-.79 4.55 4.09-2.15z"/>
        </svg>
        <span class="h-1 w-24 bg-black rounded-full mx-2"></span>
    </div>
    <form class="px-6 pb-12 max-w-2xl mx-auto" method="POST" action="">
        <div class="flex items-center border-b border-b-2 border-gray-400 py-10">
            <input class="appearance-none bg-transparent border-none w-full placeholder-gray-700 mr-3 py-1 leading-tight text-2xl focus:outline-none"
                   type="text" placeholder="Name" aria-label="Name" name="name" required>
        </div>
        <div class="flex items-center border-b border-b-2 border-gray-400 py-10">
            <input class="appearance-none bg-transparent border-none w-full placeholder-gray-700 mr-3 py-1 leading-tight text-2xl focus:outline-none"
                   type="text" placeholder="Email Address" aria-label="Email Address" name="email" required>
        </div>
        <div class="flex items-center border-b border-b-2 border-gray-400 py-10">
            <input class="appearance-none bg-transparent border-none w-full placeholder-gray-700 mr-3 py-1 leading-tight text-2xl focus:outline-none"
                   type="text" placeholder="Phone Number" aria-label="Phone Number" name="phone" required>
        </div>
        <div class="flex items-center border-b border-b-2 border-gray-400 py-10">
            <label>
                <textarea
                        class="appearance-none border-none w-full placeholder-gray-700 mr-3 py-1 leading-tight text-2xl focus:outline-none"
                        rows="5" placeholder="Message" name="message" required></textarea>
            </label>

        </div>
        <div class="py-5">
            <button class="bg-green-500 px-8 py-5 rounded-lg text-white" type="submit">Send</button>
        </div>
    </form>
</section>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mysite";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Помилка підключення: " . mysqli_connect_error());
}

class ContactInformation
{
    public $name;
    public $email;
    public $phone;
    public $message;

    public function __construct($name, $email, $phone, $message)
    {
        $this->name = $name;
        $this->email = $email;
        $this->phone = $phone;
        $this->message = $message;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];

    if (!empty($name) && !empty($email) && !empty($phone) && !empty($message)) {
        $contactInformation = new ContactInformation($name, $email, $phone, $message);

        $sql = "INSERT INTO contacts (name, email, phone, message) VALUES (?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $phone, $message);

        if (mysqli_stmt_execute($stmt)) {
            echo "Дані успішно збережені!";
        } else {
            echo "Помилка збереження даних: " . mysqli_error($conn);
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "All fields are required.";
    }
}

mysqli_close($conn);
?>

<section class="bg-gray-800 -mt-12 py-16">
        <div class="flex flex-col md:flex-row text-white text-center">
            <div class="p-6 md:w-1/3">
                <h1 class="uppercase text-2xl font-bold leading-none tracking-normal pb-5">Location</h1>
                <p>Metropolitan City of Bari,<br>
                    70121, Italy</p>
            </div>
            <div class="p-6 md:w-1/3">
                <h1 class="uppercase text-2xl font-bold  leading-none tracking-normal">Around the web</h1>
                <div class="flex justify-center py-5 ">
                    <span class="items-center rounded-full border-2 p-3 hover:bg-white mx-1">
                        <svg class="fill-current w-5 h-5 hover:text-blue-900" xmlns="http://www.w3.org/2000/svg"
                             viewBox="0 0 20 20"><title>Twitter</title><path
                                    d="M6.29 18.25c7.55 0 11.67-6.25 11.67-11.67v-.53c.8-.59 1.49-1.3 2.04-2.13-.75.33-1.54.55-2.36.65a4.12 4.12 0 0 0 1.8-2.27c-.8.48-1.68.81-2.6 1a4.1 4.1 0 0 0-7 3.74 11.65 11.65 0 0 1-8.45-4.3 4.1 4.1 0 0 0 1.27 5.49C2.01 8.2 1.37 8.03.8 7.7v.05a4.1 4.1 0 0 0 3.3 4.03 4.1 4.1 0 0 1-1.86.07 4.1 4.1 0 0 0 3.83 2.85A8.23 8.23 0 0 1 0 16.4a11.62 11.62 0 0 0 6.29 1.84"></path></svg>
                    </span>
                    <span class="items-center rounded-full border-2 p-3 hover:bg-white mx-1">
                        <svg class="fill-current w-5 h-5 hover:text-blue-900" xmlns="http://www.w3.org/2000/svg"
                             viewBox="0 0 20 20"><title>Twitter</title><path
                                    d="M6.29 18.25c7.55 0 11.67-6.25 11.67-11.67v-.53c.8-.59 1.49-1.3 2.04-2.13-.75.33-1.54.55-2.36.65a4.12 4.12 0 0 0 1.8-2.27c-.8.48-1.68.81-2.6 1a4.1 4.1 0 0 0-7 3.74 11.65 11.65 0 0 1-8.45-4.3 4.1 4.1 0 0 0 1.27 5.49C2.01 8.2 1.37 8.03.8 7.7v.05a4.1 4.1 0 0 0 3.3 4.03 4.1 4.1 0 0 1-1.86.07 4.1 4.1 0 0 0 3.83 2.85A8.23 8.23 0 0 1 0 16.4a11.62 11.62 0 0 0 6.29 1.84"></path></svg>
                    </span>
                    <span class="items-center rounded-full border-2 p-3 hover:bg-white mx-1">
                        <svg class="fill-current w-5 h-5 hover:text-blue-900" xmlns="http://www.w3.org/2000/svg"
                             viewBox="0 0 20 20"><title>Twitter</title><path
                                    d="M6.29 18.25c7.55 0 11.67-6.25 11.67-11.67v-.53c.8-.59 1.49-1.3 2.04-2.13-.75.33-1.54.55-2.36.65a4.12 4.12 0 0 0 1.8-2.27c-.8.48-1.68.81-2.6 1a4.1 4.1 0 0 0-7 3.74 11.65 11.65 0 0 1-8.45-4.3 4.1 4.1 0 0 0 1.27 5.49C2.01 8.2 1.37 8.03.8 7.7v.05a4.1 4.1 0 0 0 3.3 4.03 4.1 4.1 0 0 1-1.86.07 4.1 4.1 0 0 0 3.83 2.85A8.23 8.23 0 0 1 0 16.4a11.62 11.62 0 0 0 6.29 1.84"></path></svg>
                    </span>
                    <span class="items-center rounded-full border-2 p-3 hover:bg-white mx-1">
                        <svg class="fill-current w-5 h-5 hover:text-blue-900" xmlns="http://www.w3.org/2000/svg"
                             viewBox="0 0 20 20"><title>Twitter</title><path
                                    d="M6.29 18.25c7.55 0 11.67-6.25 11.67-11.67v-.53c.8-.59 1.49-1.3 2.04-2.13-.75.33-1.54.55-2.36.65a4.12 4.12 0 0 0 1.8-2.27c-.8.48-1.68.81-2.6 1a4.1 4.1 0 0 0-7 3.74 11.65 11.65 0 0 1-8.45-4.3 4.1 4.1 0 0 0 1.27 5.49C2.01 8.2 1.37 8.03.8 7.7v.05a4.1 4.1 0 0 0 3.3 4.03 4.1 4.1 0 0 1-1.86.07 4.1 4.1 0 0 0 3.83 2.85A8.23 8.23 0 0 1 0 16.4a11.62 11.62 0 0 0 6.29 1.84"></path></svg>
                    </span>
                </div>

            </div>
            <div class="p-6 md:w-1/3">
                <h1 class="uppercase text-2xl font-bold leading-none tracking-normal pb-5">About freelancer</h1>
                <p class="text-xl break-normal">Freelance is a free to use, MIT licensed Tailwindcss theme created by
                    <a class="text-green-500" href="https://twitter.com/framansi">Francesco Mansi</a>
                </p>
            </div>
        </div>
    </section>
</main>
<footer class="footer">
    <div class="container text-center">
        <p class="text-muted small mb-0" style="position: absolute; left: 50%; transform: translateX(-50%);">&copy;
            <?php echo date("Y.");
            $location = "Рівне, Україна";
            echo $location; ?>.</p>

    </div>


</footer>


</body>
</html>
