<header class="box-border ">
    <div class="flex items-center justify-between py-3 px-6">
        <div class="flex items-center gap-4 xl:gap-28">
            <span class="material-symbols-outlined text-4xl menu-btn xl:hidden">
                menu
            </span>
            <a href="/shopco">
                <h1 class="font-bebas text-3xl mt-1 xl:text-5xl">SHOP.CO</h1>
            </a>

            <div class="hidden xl:block">
                <nav class="h-full">
                    <ul class="flex items-center justify-between gap-12 text-xl font-raleway">
                        <li><a class="nav-link" href="/shopco/shop/products">Shop</a></li>
                        <li><a class="nav-link" href="#">On Sale</a></li>
                        <li><a class="nav-link" href="/shopco/shop/products?category=new_arrivals">New Arrivals</a></li>
                        <li><a class="nav-link" href="#">Brands</a></li>
                    </ul>
                </nav>
            </div>
        </div>

        <div class="flex items-center gap-4">
            <span class="material-symbols-outlined text-3xl xl:hidden">
                search
            </span>

            <div class="hidden xl:flex xl:items-center xl:justify-start xl:gap-4 xl:bg-[#F0F0F0] xl:py-2 xl:px-4 xl:w-96 xl:rounded-full">
                <span class="material-symbols-outlined text-3xl">
                    search
                </span>
                <input type="text" name="search-bar" id="search-bar" placeholder="Search for products..." class="bg-transparent w-full" />
            </div>

            <a href="#" class="transition-colors hover:text-green-600">
                <span class="material-symbols-outlined text-3xl">
                    shopping_cart
                </span>
            </a>

            <a href="#" class="transition-colors hover:text-green-600">
                <span class="material-symbols-outlined text-3xl account-btn">
                    account_circle
                </span>
            </a>
        </div>
    </div>

    <div class="nav-menu bg-black text-white w-3/4 h-screen fixed top-0 right-full py-6 pl-8 xl:hidden">
        <h1 class="font-bebas text-4xl tracking-widest">MENU</h1>
        <nav class="relative">
            <ul class="mt-5 text-xl">
                <li><a href="#">Nav Link</a></li>
                <li><a href="#">Nav Link</a></li>
                <li><a href="#">Nav Link</a></li>
                <li><a href="#">Nav Link</a></li>
                <li><a href="#">Nav Link</a></li>
            </ul>
        </nav>
        <span class="material-symbols-outlined close-menu-btn absolute top-5 right-5 text-4xl">
            close
        </span>
    </div>

    <div class="hidden w-screen h-screen absolute z-50 top-0 left-0 bg-[#000000aa] user-form  box-border">
        <div class="flex items-center justify-center w-full h-full box-border ">
            <div class="w-[90vw] max-h-[90vh] bg-white p-6 rounded-2xl form-container xl:w-auto xl:flex xl:items-start xl:justify-between xl:p-0 overflow-x-hidden">
                <!-- LOGIN FORM CONTAINER -->
                <div class="login-form xl:p-10 xl:flex xl:flex-col xl:items-center">
                    <h1 class="font-bebas font-semibold text-3xl text-center tracking-widest">
                        Log In
                    </h1>
                    <h2 class="font-raleway opacity-70 text-center">Please enter your username and password</h2>

                    <!-- LOGIN FORM -->
                    <form class="w-full mt-4 flex flex-col gap-4" action="/shopco/inc/users.controller.php" method="post">
                        <!-- INPUT CONTAINER -->
                        <div class="flex flex-col items-center gap-3">
                            <!-- EMAIL INPUT -->
                            <div class="flex items-center w-full gap-2 border border-gray-300 shadow-sm py-2 px-4 rounded-full">
                                <span class="material-symbols-outlined">
                                    mail
                                </span>
                                <input type="email" name="login-email" id="login-email-input" placeholder="Email" class="w-full">
                            </div>

                            <!-- PASSWORD INPUT -->
                            <div class="flex items-center w-full gap-2 border border-gray-300 shadow-sm py-2 px-4 rounded-full">
                                <span class="material-symbols-outlined">
                                    lock
                                </span>
                                <input type="password" name="login-password" id="password-input" placeholder="Password" class="w-full">
                            </div>
                        </div>

                        <div class="error-container">
                            <ul class="login-error-list pl-5 text-[#cc0000]">

                            </ul>
                        </div>

                        <!-- FORGOT PASSWORD LINK -->
                        <a href="#" class="font-raleway opacity-75 pl-1 underline">Forgot password?</a>

                        <!-- LOGIN BUTTON -->
                        <button name="login-submit-btn" type="submit" class="bg-black text-white py-2 w-full rounded-full font-raleway font-semibold">Log In</button>
                    </form>

                    <!-- CREATE ACCOUNT CONTAINER -->
                    <div class="mt-4 flex flex-col items-center">
                        <h2 class="font-raleway text-center text-lg">
                            Not a member yet?
                        </h2>
                        <span class="register-btn underline cursor-pointer">Create Account</span>
                    </div>
                </div>

                <!-- SIGN UP FORM CONTAINER -->
                <div class="sign-up-form hidden xl:bg-black xl:p-6 flex-col items-center">
                    <h1 class="font-bebas font-semibold text-3xl text-center tracking-widest xl:text-white">
                        Register for FREE
                    </h1>

                    <!-- SIGN UP FORM -->
                    <form class="w-full h-full mt-4 xl:w-2/3 flex flex-col gap-2" action="/shopco/inc/users.controller.php" method="post">
                        <!-- INPUT CONTAINER -->
                        <div class="flex flex-col items-center gap-3">
                            <!-- First Name Input -->
                            <input required type="text" name="first-name" id="first-name-input" placeholder="First Name" class="w-full border border-gray-300 shadow-sm py-2 px-4 rounded-full">

                            <!-- Last Name Input -->
                            <input required type="text" name="last-name" id="last-name-input" placeholder="Last Name" class="w-full border border-gray-300 shadow-sm py-2 px-4 rounded-full">

                            <!-- Email Input -->
                            <input required type="email" name="email" id="email-input" placeholder="Email" class="w-full border border-gray-300 shadow-sm py-2 px-4 rounded-full">

                            <!-- Password Input -->
                            <input required type="password" name="password" id="sign-up-password-input" placeholder="Password" class="w-full border border-gray-300 shadow-sm py-2 px-4 rounded-full">

                            <!-- Confirm Password -->
                            <input required type="password" name="confirm-password" id="confirm-password-input" placeholder="Confirm Password" class="w-full border border-gray-300 shadow-sm py-2 px-4 rounded-full">
                        </div>

                        <div class="error-container">
                            <ul class="signup-error-list pl-5 text-[#cc0000]">

                            </ul>
                        </div>

                        <!--Terms and Conditions Container  -->
                        <div class="flex justify-center gap-2 mt-4">
                            <!-- Terms and Conditions Input -->
                            <input required type="checkbox" name="terms-and-conditions" id="terms-and-conditions-checkbox">
                            <label for="terms-and-conditions-checkbox" class="text-sm w-[90%] xl:text-white">
                                I agree to <a href="#" class="underline">Terms and Conditions</a>
                            </label>
                        </div>

                        <!-- Email updates container -->
                        <div class="flex justify-center gap-2 mt-4">
                            <!-- Subscription input -->
                            <input type="checkbox" name="subscription" id="subscription-checkbox">
                            <label for="subscription-checkbox" class="text-sm w-[90%] xl:text-white">
                                I want to recieve discounts and updates on my email
                            </label>
                        </div>

                        <button name="signup-submit-btn" type="submit" class="bg-black text-white py-2 w-full rounded-full font-raleway font-semibold mt-4 xl:bg-white xl:text-black">Sign Up</button>
                    </form>

                    <!-- Log In link container -->
                    <div class="mt-4 flex flex-col items-center xl:text-white">
                        <h2 class="font-raleway text-center text-lg">
                            Already Registered?
                        </h2>
                        <span class="login-btn underline cursor-pointer">Log In</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>