<div class="container mx-auto px-4 py-20">
    <div class="flex flex-col">
        <h1 class="text-4xl font-bold flex justify-center">Shopping Cart</h1>
        <div class="flex justify-center mt-4 text-md text-gray-500">
            <!-- to home button-->
            <a href="#" class="hover:text-black">Home&nbsp;&nbsp;</a>
            <svg xmlns="http://www.w3.org/2000/svg" class="mt-[6px]" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right">
                <polyline points="9 18 15 12 9 6"></polyline>
            </svg>
            <p class="text-black">&nbsp;&nbsp;Your Shopping Cart</p>
        </div>
        <table class="table-fixed mt-8 border-collapse border-collapse border-b border-gray-300">
            <thead class="border-collapse border-b border-gray-300 font-bold text-lg">
                <th class="lg:w-[55%] text-left">Product</th>
                <th class="text-end hidden sm:table-cell lg:w-[10%] lg:text-left">Price</th>
                <th class="lg:w-[25%] text-left hidden lg:table-cell">Quantity</th>
                <th class="lg:w-[10%] text-left hidden lg:table-cell">Total</th>
            </thead>
            <tbody>
                <!-- All items -->
                <tr>
                    <!-- item content -->
                    <td class="flex mt-8 mb-8">
                        <img src="\src\img\demo_tree.png" class="w-32 h-32" alt="tonmai">
                        <div class="grid content-center ml-8 mr-8">
                            <p class="text-lg">Monstera Tree</p>
                            <p class="text-sm text-gray-500">Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae, aperiam
                                velit quaerat iste nostrum reiciendis recusandae, ipsum molestias quis modi commodi maiores officia atque
                                nemo impedit, magnam ullam natus totam.</p>
                            <div class="">
                                <p class="text-gray-500 text-md underline">Remove</p>
                            </div>
                            <p class="mb-3 mt-4 lg:mb-0 text-left sm:hidden"><span class="font-bold">Price : </span>$12.00</p>
                            <div class="flex gap-4 justify-start items-center table-cell sm:hidden">
                                <div class="flex">
                                    <button class="border-black border-2 py-0.5 px-2 bg-black text-white">
                                        <i class="fa-solid fa-plus"></i>
                                    </button>
                                    <input class="border-black border-y-2 py-0.5 w-14 text-center focus:outline-0 text-sm" value="1">
                                    <button class="border-black border-2 py-0.5 px-2">
                                        <i class="fa-solid fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                        </div>

                    </td>
                    <!-- Price -->
                    <td>
                        <!-- Price Responsive-->
                        <p class="mb-3 lg:mb-0 text-center lg:text-left hidden sm:block">$12.00</p>
                        <!-- Quantity Responsive -->
                        <div class="flex gap-4 justify-start items-center hidden sm:table-cell lg:hidden">
                            <div class="flex">
                                <button class="border-black border-2 py-0.5 px-2 bg-black text-white">
                                    <i class="fa-solid fa-plus"></i>
                                </button>
                                <input class="border-black border-y-2 py-0.5 w-14 text-center focus:outline-0 text-sm" value="1">
                                <button class="border-black border-2 py-0.5 px-2">
                                    <i class="fa-solid fa-minus"></i>
                                </button>
                            </div>
                        </div>
                    </td>
                    <!-- Quantity -->
                    <td class="hidden lg:table-cell">
                        <div class="flex gap-4 justify-start items-center">
                            <div class="flex">
                                <button class="border-black border-2 py-0.5 px-2 bg-black text-white">
                                    <i class="fa-solid fa-plus"></i>
                                </button>
                                <input class="border-black border-y-2 py-0.5 w-14 text-center focus:outline-0 text-sm" value="1">
                                <button class="border-black border-2 py-0.5 px-2">
                                    <i class="fa-solid fa-minus"></i>
                                </button>
                            </div>
                        </div>
                    </td>
                    <!-- Total -->
                    <td class="hidden lg:table-cell">
                        <p>$12.00</p>
                    </td>
                </tr>

                <!-- Add more item example -->
                <tr>
                    <!-- item content -->
                    <td class="flex mt-8 mb-8">
                        <img src="\src\img\demo_tree.png" class="w-32 h-32" alt="tonmai">
                        <div class="grid content-center ml-8 mr-8">
                            <p class="text-lg">Monstera Tree</p>
                            <p class="text-sm text-gray-500">Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae, aperiam
                                velit quaerat iste nostrum reiciendis recusandae, ipsum molestias quis modi commodi maiores officia atque
                                nemo impedit, magnam ullam natus totam.</p>
                            <div class="">
                                <p class="text-gray-500 text-md underline">Remove</p>
                            </div>
                            <p class="mb-3 mt-4 lg:mb-0 text-left sm:hidden"><span class="font-bold">Price : </span>$12.00</p>
                            <div class="flex gap-4 justify-start items-center table-cell sm:hidden">
                                <div class="flex">
                                    <button class="border-black border-2 py-0.5 px-2 bg-black text-white">
                                        <i class="fa-solid fa-plus"></i>
                                    </button>
                                    <input class="border-black border-y-2 py-0.5 w-14 text-center focus:outline-0 text-sm" value="1">
                                    <button class="border-black border-2 py-0.5 px-2">
                                        <i class="fa-solid fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                        </div>

                    </td>
                    <!-- Price -->
                    <td>
                        <!-- Price Responsive-->
                        <p class="mb-3 lg:mb-0 text-center lg:text-left hidden sm:block">$12.00</p>
                        <!-- Quantity Responsive -->
                        <div class="flex gap-4 justify-start items-center hidden sm:table-cell lg:hidden">
                            <div class="flex">
                                <button class="border-black border-2 py-0.5 px-2 bg-black text-white">
                                    <i class="fa-solid fa-plus"></i>
                                </button>
                                <input class="border-black border-y-2 py-0.5 w-14 text-center focus:outline-0 text-sm" value="1">
                                <button class="border-black border-2 py-0.5 px-2">
                                    <i class="fa-solid fa-minus"></i>
                                </button>
                            </div>
                        </div>
                    </td>
                    <!-- Quantity -->
                    <td class="hidden lg:table-cell">
                        <div class="flex gap-4 justify-start items-center">
                            <div class="flex">
                                <button class="border-black border-2 py-0.5 px-2 bg-black text-white">
                                    <i class="fa-solid fa-plus"></i>
                                </button>
                                <input class="border-black border-y-2 py-0.5 w-14 text-center focus:outline-0 text-sm" value="1">
                                <button class="border-black border-2 py-0.5 px-2">
                                    <i class="fa-solid fa-minus"></i>
                                </button>
                            </div>
                        </div>
                    </td>
                    <!-- Total -->
                    <td class="hidden lg:table-cell">
                        <p>$12.00</p>
                    </td>
                </tr>

                <tr>
                    <!-- item content -->
                    <td class="flex mt-8 mb-8">
                        <img src="\src\img\demo_tree.png" class="w-32 h-32" alt="tonmai">
                        <div class="grid content-center ml-8 mr-8">
                            <p class="text-lg">Monstera Tree</p>
                            <p class="text-sm text-gray-500">Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae, aperiam
                                velit quaerat iste nostrum reiciendis recusandae, ipsum molestias quis modi commodi maiores officia atque
                                nemo impedit, magnam ullam natus totam.</p>
                            <div class="">
                                <p class="text-gray-500 text-md underline">Remove</p>
                            </div>
                            <p class="mb-3 mt-4 lg:mb-0 text-left sm:hidden"><span class="font-bold">Price : </span>$12.00</p>
                            <div class="flex gap-4 justify-start items-center table-cell sm:hidden">
                                <div class="flex">
                                    <button class="border-black border-2 py-0.5 px-2 bg-black text-white">
                                        <i class="fa-solid fa-plus"></i>
                                    </button>
                                    <input class="border-black border-y-2 py-0.5 w-14 text-center focus:outline-0 text-sm" value="1">
                                    <button class="border-black border-2 py-0.5 px-2">
                                        <i class="fa-solid fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                        </div>

                    </td>
                    <!-- Price -->
                    <td>
                        <!-- Price Responsive-->
                        <p class="mb-3 lg:mb-0 text-center lg:text-left hidden sm:block">$12.00</p>
                        <!-- Quantity Responsive -->
                        <div class="flex gap-4 justify-start items-center hidden sm:table-cell lg:hidden">
                            <div class="flex">
                                <button class="border-black border-2 py-0.5 px-2 bg-black text-white">
                                    <i class="fa-solid fa-plus"></i>
                                </button>
                                <input class="border-black border-y-2 py-0.5 w-14 text-center focus:outline-0 text-sm" value="1">
                                <button class="border-black border-2 py-0.5 px-2">
                                    <i class="fa-solid fa-minus"></i>
                                </button>
                            </div>
                        </div>
                    </td>
                    <!-- Quantity -->
                    <td class="hidden lg:table-cell">
                        <div class="flex gap-4 justify-start items-center">
                            <div class="flex">
                                <button class="border-black border-2 py-0.5 px-2 bg-black text-white">
                                    <i class="fa-solid fa-plus"></i>
                                </button>
                                <input class="border-black border-y-2 py-0.5 w-14 text-center focus:outline-0 text-sm" value="1">
                                <button class="border-black border-2 py-0.5 px-2">
                                    <i class="fa-solid fa-minus"></i>
                                </button>
                            </div>
                        </div>
                    </td>
                    <!-- Total -->
                    <td class="hidden lg:table-cell">
                        <p>$12.00</p>
                    </td>
                </tr>
            </tbody>
        </table>
        <!-- Shipping -->
        <div class="md:flex md:justify-end mt-4">
            <div class="flex flex-col gap-2 p-6 md:w-[30%] xl:mr-16">
                <div class="flex flex-col items-center">
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-truck">
                            <rect x="1" y="3" width="15" height="13"></rect>
                            <polygon points="16 8 20 8 23 11 23 16 16 16 16 8"></polygon>
                            <circle cx="5.5" cy="18.5" r="2.5"></circle>
                            <circle cx="18.5" cy="18.5" r="2.5"></circle>
                        </svg>
                    </div>
                    <p class="text-gray-500 text-xs">Shipping</p>
                </div>
                <div class="flex justify-between text-md">
                    <p>Subtotal</p>
                    <p>36.00$</p>
                </div>
                <div class="flex flex-col gap-2 items-center">
                    <button class="bg-black text-white w-full py-0.5">Confirm</button>
                </div>
            </div>
        </div>
    </div>
</div>