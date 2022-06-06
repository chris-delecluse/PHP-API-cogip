<?php $title = "home" ?>
<?php ob_start() ?>

    <main class="grid align-center bg-[#081A2E]">
        <div class="m-auto w-5/6 h-full mb-24">
            <h1 class="text-center mt-10 mb-10 text-4xl text-white">Simple cogip API</h1>
            <div class="flex flex-col">
                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="overflow-hidden">
                            <table class="m-auto w-5/6 border-x border-y border-[#102A46] text-center">
                                <thead class="border-b">
                                    <tr>
                                        <th scope="col" class="text-sm font-medium text-[#3399FE] px-6 py-4 border-x border-y border-[#102A46]">Method</th>
                                        <th scope="col" class="text-sm font-medium text-[#3399FE] px-6 py-4 border-x border-y border-[#102A46]">Url</th>
                                        <th scope="col" class="text-sm font-medium text-[#3399FE] px-6 py-4 border-x border-y border-[#102A46]">Explanation</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-[#EF6C00] border-x border-[#102A46]">GET</td>
                                        <td class="text-sm text-white font-light px-6 py-4 whitespace-nowrap border-x border-[#102A46]">/people/get/all</td>
                                        <td class="text-sm text-white font-light px-6 py-4 whitespace-nowrap border-x border-[#102A46]">Get all people</td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-[#EF6C00] border-x border-[#102A46]">GET</td>
                                        <td class="text-sm text-white font-light px-6 py-4 whitespace-nowrap border-x border-[#102A46]">/people/get/{id}</td>
                                        <td class="text-sm text-white font-light px-6 py-4 whitespace-nowrap border-x border-[#102A46]">Get people by id</td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-[#EF6C00] border-x border-[#102A46]">POST</td>
                                        <td class="text-sm text-white font-light px-6 py-4 whitespace-nowrap border-x border-[#102A46]">/people/post</td>
                                        <td class="text-sm text-white font-light px-6 py-4 whitespace-nowrap border-x border-[#102A46]">Create a new person</td>
                                    <tr class="border-b border-[#102A46]">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-[#EF6C00] border-x border-[#102A46]">DELETE</td>
                                        <td class="text-sm text-white font-light px-6 py-4 whitespace-nowrap border-x border-[#102A46]">/people/delete/{id}</td>
                                        <td class="text-sm text-white font-light px-6 py-4 whitespace-nowrap border-x border-[#102A46]">Delete a person</td>
                                    </tr>

                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-[#EF6C00] border-x border-[#102A46]">GET</td>
                                        <td class="text-sm text-white font-light px-6 py-4 whitespace-nowrap border-x border-[#102A46]">/company/get/all</td>
                                        <td class="text-sm text-white font-light px-6 py-4 whitespace-nowrap border-x border-[#102A46]">Get all companies</td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-[#EF6C00] border-x border-[#102A46]">GET</td>
                                        <td class="text-sm text-white font-light px-6 py-4 whitespace-nowrap border-x border-[#102A46]">/company/get/{id}</td>
                                        <td class="text-sm text-white font-light px-6 py-4 whitespace-nowrap border-x border-[#102A46]">Get company by id</td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-[#EF6C00] border-x border-[#102A46]">POST</td>
                                        <td class="text-sm text-white font-light px-6 py-4 whitespace-nowrap border-x border-[#102A46]">/company/post</td>
                                        <td class="text-sm text-white font-light px-6 py-4 whitespace-nowrap border-x border-[#102A46]">Create a new company</td>
                                    <tr class="border-b border-[#102A46]">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-[#EF6C00] border-x border-[#102A46]">DELETE</td>
                                        <td class="text-sm text-white font-light px-6 py-4 whitespace-nowrap border-x border-[#102A46]">/company/delete/{id}</td>
                                        <td class="text-sm text-white font-light px-6 py-4 whitespace-nowrap border-x border-[#102A46]">Delete an company</td>
                                    </tr>

                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-[#EF6C00] border-x border-[#102A46]">GET</td>
                                        <td class="text-sm text-white font-light px-6 py-4 whitespace-nowrap border-x border-[#102A46]">/invoice/get/all</td>
                                        <td class="text-sm text-white font-light px-6 py-4 whitespace-nowrap border-x border-[#102A46]">Get all invoices</td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-[#EF6C00] border-x border-[#102A46]">GET</td>
                                        <td class="text-sm text-white font-light px-6 py-4 whitespace-nowrap border-x border-[#102A46]">/invoice/get/{id}</td>
                                        <td class="text-sm text-white font-light px-6 py-4 whitespace-nowrap border-x border-[#102A46]">Get invoice by id</td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-[#EF6C00] border-x border-[#102A46]">POST</td>
                                        <td class="text-sm text-white font-light px-6 py-4 whitespace-nowrap border-x border-[#102A46]">/invoice/post</td>
                                        <td class="text-sm text-white font-light px-6 py-4 whitespace-nowrap border-x border-[#102A46]">Create a new invoice</td>
                                    <tr class="border-[#102A46]">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-[#EF6C00] border-x border-[#102A46]">DELETE</td>
                                        <td class="text-sm text-white font-light px-6 py-4 whitespace-nowrap border-x border-[#102A46]">/invoice/delete/{id}</td>
                                        <td class="text-sm text-white font-light px-6 py-4 whitespace-nowrap border-x border-[#102A46]">Delete an invoice</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>


<?php $content = ob_get_clean() ?>
<?php require('layouts/layout.php') ?>