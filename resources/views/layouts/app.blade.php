<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Temporary for multi-step form -->
    <style>
        .form-section {
            display: none;
        }

        .form-section.current {
            display: inline;
        }

        .parsley-errors-list {
            color: red;
        }
    </style>
    <!-- End Temporary for multi-step form -->

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js"
        integrity="sha512-eyHL1atYNycXNXZMDndxrDhNAegH2BDWt1TmkXJPoGf1WLlNYt08CSjkqF5lnCRmdm3IrkHid8s2jOUY4NIZVQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-white dark:bg-gray-800 shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>

    <!-- Temporary for multi-step form -->

    <script>
        // TODO: Add functionality that auto-populates the slug fields based on the title field (eras, libraries, instruments, and tags)

        $(function() {
            var $sections = $('.form-section');

            function navigateTo(index) {
                // Mark the current section with the class 'current'
                $sections
                    .removeClass('current')
                    .eq(index)
                    .addClass('current');
                // Show only the navigation buttons that make sense for the current section:
                $('.form-navigation .previous').toggle(index > 0);
                var atTheEnd = index >= $sections.length - 1;
                $('.form-navigation .next').toggle(!atTheEnd);
                $('.form-navigation [type=submit]').toggle(atTheEnd);


                const step = document.querySelector('.step' + index);
                step.style.backgroundColor = 'green';
                step.style.color = 'white';
                const nextStep = document.querySelector('.step' + (index + 1));
                nextStep.style.backgroundColor = 'unset';

            }

            function curIndex() {
                // Return the current index by looking at which section has the class 'current'
                return $sections.index($sections.filter('.current'));
            }

            $('.form-navigation .previous').click(function() {
                navigateTo(curIndex() - 1);
            });

            $('.form-navigation .next').click(function() {
                $('.new-listing-form').parsley().whenValidate({
                    group: 'block-' + curIndex()
                }).done(function() {
                    navigateTo(curIndex() + 1);
                });
            });

            $sections.each(function(index, section) {
                $(section).find(':input').attr('data-parsley-group', 'block-' + index);
            });

            if ($sections.length > 0) {
                navigateTo(0);
            }
        });
    </script>
    <!-- End Temporary for multi-step form -->

    <!-- TEMP JavaScript to handle tab switching -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const tabs = document.querySelectorAll('[name="tab"]');
            const tabLabels = document.querySelectorAll('label[for^="tab"]');
            const tabContentItems = document.querySelectorAll('.tab-content-item');

            // initialize labels
            tabLabels.forEach(label => {
                // if the label is for tab1 then add the dark:bg-gray-600 class
                if (label.htmlFor === 'tab1') {
                    label.classList.add('dark:bg-gray-600');
                    label.classList.add('bg-gray-200');

                } else {
                    label.classList.add('dark:bg-gray-700');
                    label.classList.add('bg-gray-100');


                }


                // Handle keyboard navigation
                label.addEventListener('keydown', function(event) {
                    if (event.key === 'Enter' || event.key === ' ') {
                        event.preventDefault();
                        this.click();
                    }
                });

                // Add focus styles
                label.addEventListener('focus', function() {
                    this.classList.add('focus');
                });
                label.addEventListener('blur', function() {
                    this.classList.remove('focus');
                });
            });

            tabs.forEach(tab => {
                tab.addEventListener('change', function() {
                    const selectedTabContent = document.querySelector(`#${this.id}-content`);

                    // Hide all tab content
                    tabContentItems.forEach(item => {
                        item.classList.add('hidden');
                    });

                    // show the selected tab content
                    selectedTabContent.classList.remove('hidden');

                    // Reset classes for all labels
                    tabLabels.forEach(label => {
                        if (label.htmlFor === this.id) {
                            label.classList.remove('dark:bg-gray-700');
                            label.classList.add('dark:bg-gray-600');
                            label.classList.remove('border');
                            label.classList.add('bg-gray-200');
                            label.classList.remove('bg-gray-100');
                        } else {
                            label.classList.remove('dark:bg-gray-600');
                            label.classList.add('dark:bg-gray-700');
                            label.classList.add('dark:border-gray-800');
                            label.classList.add('border');
                            label.classList.add('bg-gray-100');
                            label.classList.remove('bg-gray-200');

                        }
                    });
                });
            });

        });
    </script>

    <!-- END TEMP JavaScript to handle tab switching -->
</body>

</html>
