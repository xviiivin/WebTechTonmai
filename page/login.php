<?php

if ($_POST["action"] == "login") {

    if (!isset($_POST["email"]) || !isset($_POST["password"])) {
        alert("error", "กรุณากรอกข้อมูลให้ครบ");
    } else {
        $check = $db->prepare("SELECT * FROM users WHERE email = :email AND password = :password");
        $check->execute(array(":email" => strtolower($_POST["email"]), ":password" => md5($_POST["password"])));
        $test = $check->fetch(PDO::FETCH_ASSOC);
        if ($test) {
            $_SESSION["login"] = $test;
            alert("success", "ล็อกอินสำเร็จแล้ว", $link);
        } else {
            alert("error", "อีเมลหรือรหัสผ่านไม่ถูกต้อง");
        }
    }
}

?>


<section>
    <!-- Header -->
    <div class="container mx-auto pb-24">
        <div class="flex items-center justify-center flex-col mt-[10em]">
            <h1 class="text-4xl font-bold">Login</h1>
        </div>

        <div class="flex justify-center text-md text-gray-500 mt-4">
            <!-- nav button-->
            <a href="<?= $link ?>" class="hover:text-black">Home&nbsp;&nbsp;</a>
            <svg xmlns="http://www.w3.org/2000/svg" class="mt-[6px]" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right">
                <polyline points="9 18 15 12 9 6"></polyline>
            </svg>
            <p class="text-black">&nbsp;&nbsp;Account</p>
        </div>

        <!-- auth -->
        <div class="flex container mx-auto px-14 flex-col md:flex-row gap-12 justify-center mt-10">

            <!-- login -->
            <div class="flex flex-col w-11/12 max-w-lg">
                <h1 class="text-2xl">Login</h1>

                <form action="<?= $link . "?page=login" ?>" method="post">
                    <input type="text" name="action" value="login" style="display: none;">
                    <div class="py-2">
                        <!-- <span class="px-1 text-sm text-gray-600">Username</span> -->
                        <input required type="email" name="email" placeholder="Username" class="text-md block px-3 py-2 space-x-10 rounded-lg bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md focus:placeholder-gray-500 focus:bg-white focus:border-gray-600 focus:outline-none w-full">
                    </div>

                    <div class="py-2" x-data="{ show: true }">
                        <div class="relative">
                            <input required name="password" placeholder="Password" :type="show ? 'password' : 'text'" class="text-md block px-3 py-2 rounded-lg bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md focus:placeholder-gray-500 focus:bg-white  focus:border-gray-600  focus:outline-none w-full">
                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center text-sm ">
                                <svg class="h-6 text-gray-700" fill="none" @click="show = !show" :class="{'hidden ': !show, 'block ':show }" viewbox="0 0 640 512">
                                    <path fill="currentColor" d="M320 400c-75.85 0-137.25-58.71-142.9-133.11L72.2 185.82c-13.79 17.3-26.48 35.59-36.72 55.59a32.35 32.35 0 0 0 0 29.19C89.71 376.41 197.07 448 320 448c26.91 0 52.87-4 77.89-10.46L346 397.39a144.13 144.13
                                      0 0 1-26 2.61zm313.82 58.1l-110.55-85.44a331.25 331.25 0 0 0 81.25-102.07 32.35 32.35 0 0 0 0-29.19C550.29 135.59 442.93 64 320 64a308.15 308.15 0 0 0-147.32 37.7L45.46 3.37A16 16 0 0 0 23 6.18L3.37 31.45A16 16
                                      0 0 0 6.18 53.9l588.36 454.73a16 16 0 0 0 22.46-2.81l19.64-25.27a16 16 0 0 0-2.82-22.45zm-183.72-142l-39.3-30.38A94.75 94.75 0 0 0 416 256a94.76 94.76 0 0 0-121.31-92.21A47.65 47.65 0 0 1 304 192a46.64 46.64 0 0
                                      1-1.54 10l-73.61-56.89A142.31 142.31 0 0 1 320 112a143.92 143.92 0 0 1 144 144c0 21.63-5.29 41.79-13.9 60.11z ">
                                    </path>
                                </svg>
                                <svg class="h-6 text-gray-700" fill="none" @click="show = !show;console.log('wadaw')  " :class=" { 'block ': !show, 'hidden ':show } " viewbox="0 0 576 512">
                                    <path fill="currentColor" d="M572.52 241.4C518.29 135.59 410.93 64 288 64S57.68 135.64 3.48 241.41a32.35 32.35 0 0 0 0 29.19C57.71 376.41 165.07 448 288 448s230.32-71.64 284.52-177.41a32.35 32.35 0 0 0 0-29.19zM288 400a144 144 0 1 1 144-144 143.93 143.93 0 0 1-144 144zm0-240a95.31 95.31 0 0 0-25.31 3.79 47.85 47.85 0 0 1-66.9 66.9A95.78 95.78 0 1 0 288 160z">
                                    </path>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- ห้ามลืม -->
                    <!-- <a class="text-[#9E9E9E]" href="#">Forget your password?</a> -->
                    <div>
                        <button type="submit" class="mt-3 text-lg font-semibold bg-black text-white shadow-xl hover:text-white hover:bg-[#202020] py-3 w-full">
                            Sign in
                        </button>
                    </div>

                </form>

            </div>

            <!-- new customer -->
            <div class="flex flex-col w-11/12 max-w-lg">
                <h1 class="text-2xl">New Customer</h1>
                <p class="text-[#9E9E9E]">Sign up here to become one of us!</p>
                <br />
                <div>
                    <a href="<?= $link . "?page=register" ?>" class="mt-3 text-lg font-semibold bg-black text-white shadow-xl hover:text-white hover:bg-[#202020] py-3 px-12">
                        Register
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>