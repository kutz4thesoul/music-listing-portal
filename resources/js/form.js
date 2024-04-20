// TODO: Add functionality that auto-populates the slug fields based on the title field (eras, libraries, instruments, and tags)

$(function () {
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

    $('.form-navigation .previous').click(function () {
        navigateTo(curIndex() - 1);
    });

    $('.form-navigation .next').click(function () {
        $('.new-listing-form').parsley().whenValidate({
            group: 'block-' + curIndex()
        }).done(function () {
            navigateTo(curIndex() + 1);
        });
    });

    $sections.each(function (index, section) {
        $(section).find(':input').attr('data-parsley-group', 'block-' + index);
    });

    if ($sections.length > 0) {
        navigateTo(0);
    }
});

document.addEventListener('DOMContentLoaded', function () {
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
        label.addEventListener('keydown', function (event) {
            if (event.key === 'Enter' || event.key === ' ') {
                event.preventDefault();
                this.click();
            }
        });

        // Add focus styles
        label.addEventListener('focus', function () {
            this.classList.add('focus');
        });
        label.addEventListener('blur', function () {
            this.classList.remove('focus');
        });
    });

    tabs.forEach(tab => {
        tab.addEventListener('change', function () {
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