@extends('layout')
@section('head')
    <title>IPOST - Privacy Policy</title>
@endsection
@section('main')
    <div class=" bg-gradient-to-r from-cyan-200 to-blue-400  md:mx-40 flex flex-col sm:flex-row pt-24">
        <div class=" "><img class=" h-40 max-w-xs " src="{{ asset('/images/privacy.png') }}" alt="image description"></div>
        <div class=" mx-4 mt-10">
            <h1 class="text-2xl  font-bold">Privacy Policy </h1>
            <p class="text-xl">This Privacy Policy is meant to help you understand what information we collect, why we
                collect it, and how
                you can update, manage, export, and delete your information.
            </p>
            <hr />
        </div>
    </div>
    <div class="dark:text-white ">
    <div class="mx-4 md:mx-40 mt-5 mb-5">
        <h2 class="text-2xl font-bold">Privacy Policy for IPOST - A Child Product of HYTEK</h2>
        <p class="text-xl">At IPOST, we are committed to protecting your privacy as a user of our website. Our Privacy
            Policy outlines the collection, use, and protection of your personal data in compliance with the applicable laws
            and regulations.</p>
    </div>
    <div class="mx-4 md:mx-40 mb-5 ">

        <h2 class="text-2xl font-bold">Data Collection</h2>
        <p class="text-xl">We collect your personal data when you register on our website and use our services. This
            includes your name, email address, and any other information you provide to us. We also collect data through
            cookies and similar technologies to improve your user experience.</p>
    </div>

    <div class="mx-4 md:mx-40 mb-5 ">
        <h2 class="text-2xl font-bold">Use of Data</h2>
        <p class="text-xl">We use your data to provide and improve our services, and to communicate with you about our
            products and services. We may also use your data for marketing and promotional purposes, but only with your
            consent.</p>
    </div>
    <div class="mx-4 md:mx-40 mb-5 ">
        <h2 class="text-2xl font-bold">Protection of Data</h2>
        <p class="text-xl">We take the security of your personal data seriously and have implemented appropriate
            technical
            and organizational measures to protect your data from unauthorized access, loss, or theft. We retain
            your data
            for as long as necessary to fulfill the purposes for which it was collected, or as required by law.</p>
    </div>
    <div class="mx-4 md:mx-40 mb-5 ">
        <h2 class="text-2xl font-bold">Data Sharing</h2>
        <p class="text-xl">We do not sell or share your personal data with third parties, except as necessary to
            provide our
            services or comply with legal obligations. We may share your data with our affiliates or service
            providers, but
            only to the extent necessary to provide the services you requested.</p>
    </div>
    <div class="mx-4 md:mx-40  mb-5 ">
        <h2 class="text-2xl font-bold">Your Rights</h2>
        <p class="text-xl">You have the right to access, correct, or delete your personal data, as well as
            to object to or
            restrict its processing. You also have the right to withdraw your consent to our use of your
            data for marketing
            purposes. Please contact us if you wish to exercise any of these rights.</p>
    </div>
    <div class="mx-4 md:mx-40 mb-5">
        <h2 class="text-2xl font-bold">HYTEK</h2>
        <p class="text-xl">IPOST is a child product of HYTEK. HYTEK is committed to protecting the
            privacy and personal data
            of our users, and we apply the same data collection, use, and protection practices to iPost
            as we do to all of
            our products and services.

            If you have any questions or concerns about our Privacy Policy or the collection, use, or
            protection of your
            personal data, please contact us at <a class="text-indigo-500"
                href="mailto:kuldeep@hytek.org.in">kuldeep@hytek.org.in</a> </p>
    </div>
</div>
@endsection
