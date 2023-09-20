<header>
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

    <div class="hidden w-screen h-screen absolute z-50 top-0 left-0 bg-[#000000aa] user-form">
        <div class="flex items-center justify-center w-screen h-screen">
            <div class="w-3/4 bg-white p-6 rounded-2xl form-container">
                <div class="login-form">
                    <h1 class="font-bebas font-semibold text-3xl text-center tracking-widest">
                        Please Log In
                    </h1>
                    <form class="w-full mt-4" action="">
                        <div class="flex flex-col items-center gap-3">
                            <div class="flex items-center w-full gap-2 border border-gray-300 shadow-sm py-2 px-4 rounded-full">
                                <span class="material-symbols-outlined">
                                    person
                                </span>
                                <input type="text" name="" id="" placeholder="Username">
                            </div>
                            <div class="flex items-center w-full gap-2 border border-gray-300 shadow-sm py-2 px-4 rounded-full">
                                <span class="material-symbols-outlined">
                                    lock
                                </span>
                                <input type="password" name="" id="" placeholder="Password">
                            </div>
                        </div>
                        <button type="submit" class="bg-black text-white py-2 w-full rounded-full font-raleway font-semibold mt-4">Log In</button>
                    </form>
                    <div class="mt-4 flex flex-col items-center">
                        <h2 class="font-raleway text-center text-lg">
                            Not a member yet?
                        </h2>
                        <span class="register-btn underline">Create Account</span>
                    </div>
                </div>

                <div class="sign-up-form hidden">
                    <h1 class="font-bebas font-semibold text-3xl text-center tracking-widest">
                        Register for FREE
                    </h1>
                    <form class="w-full mt-4" action="">
                        <div class="flex flex-col items-center gap-3">
                            <input required type="text" name="" id="" placeholder="First Name" class="w-full border border-gray-300 shadow-sm py-2 px-4 rounded-full">
                            <input required type="text" name="" id="" placeholder="Last Name" class="w-full border border-gray-300 shadow-sm py-2 px-4 rounded-full">
                            <input required type="email" name="" id="" placeholder="Email" class="w-full border border-gray-300 shadow-sm py-2 px-4 rounded-full">
                            <input required type="password" name="" id="" placeholder="Password" class="w-full border border-gray-300 shadow-sm py-2 px-4 rounded-full">
                            <input required type="password" name="" id="" placeholder="Confirm Password" class="w-full border border-gray-300 shadow-sm py-2 px-4 rounded-full">
                        </div>
                        <button type="submit" class="bg-black text-white py-2 w-full rounded-full font-raleway font-semibold mt-4">Sign Up</button>
                    </form>
                    <div class="mt-4 flex flex-col items-center">
                        <h2 class="font-raleway text-center text-lg">
                            Already Registered?
                        </h2>
                        <span class="login-btn underline">Log In</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>