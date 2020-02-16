<template>
    <div>
        <h3 class="text-gray-500 uppercase font-semibold text-xl text-center">About <span class="text-green-500">Me</span></h3>
        <div class="pt-4 p-6 text-lg tracking-normal leading-normal">
            I am a {{ age() }} old web developer from Skopje, Macedonia, who studied software engineering at <a href="http://www.uacs.edu.mk/home/" target="_blank" rel="noreferrer" class="font-semibold text-green-500 hover:text-green-600 ">University American College Skopje</a> and have more than {{ yearsOfExperience() }} of experience building custom web based solutions.
            <br>
            <br>
            Currently, I am working as a Senior PHP Developer for clients as part of <a href="https://quantox.com/" target="_blank" rel="noreferrer" class="font-semibold text-green-500 hover:text-green-600">Quantox Technology</a>, for about {{ withQuantoxSince() }}.
            <br>
            <br>
            I am also a PHP Community Tech Lead as part of <a href="https://adevait.com/" target="_blank" rel="noreferrer" class="font-semibold text-green-500 hover:text-green-600 ">Adeva, an exclusive developers' network</a>, for about {{ withAdevaSince() }}.
            <br>
            <br>
            Previously, I worked at:
            <br>
            - <a href="http://tabellarius.mk" target="_blank" rel="noreferrer" class="font-semibold text-green-500 hover:text-green-600 ">Tabellarius</a> (June 2015 - March 2016, {{ workedAtTabellariusFor() }}),
            <br>
            - New Media Corp (April 2016 - February 2017, {{ workedAtNewMediaCorpFor() }})
            <br>
            - <a href="http://www.intertec.io/" target="_blank" rel="noreferrer" class="font-semibold text-green-500 hover:text-green-600 ">Intertec</a> as part of the Routyx team (March 2017 - December 2017, {{ workedAtRoutyxFor() }}).
            <br>
            <br>
            Also, I was a mentor at <a href="https://femalebootcamp.adevait.com/" target="_blank" rel="noreferrer" class="font-semibold text-green-500 hover:text-green-600 ">Adeva's Female Bootcamp 2018</a>. You can read more about the bootcamp experience <a href="https://blog.usejournal.com/the-tech-bootcamp-experience-ff53367b79a7" target="_blank" rel="noreferrer" class="font-semibold text-green-500 hover:text-green-600 ">here</a>
            <br>
            <br>
            To contact me, you can use the contact form below. You can also find more or contact me on the following social networks:
        </div>
        <div class="flex mt-4 pl-6">
            <a href="https://www.linkedin.com/in/davorminchorov" target="_blank" rel="noreferrer" class="pl-1">
                <svg class="h-12 w-12" viewBox="0 0 24 24">
                    <path fill="#0077B5" d="M19,3A2,2 0 0,1 21,5V19A2,2 0 0,1 19,21H5A2,2 0 0,1 3,19V5A2,2 0 0,1 5,3H19M18.5,18.5V13.2A3.26,3.26 0 0,0 15.24,9.94C14.39,9.94 13.4,10.46 12.92,11.24V10.13H10.13V18.5H12.92V13.57C12.92,12.8 13.54,12.17 14.31,12.17A1.4,1.4 0 0,1 15.71,13.57V18.5H18.5M6.88,8.56A1.68,1.68 0 0,0 8.56,6.88C8.56,5.95 7.81,5.19 6.88,5.19A1.69,1.69 0 0,0 5.19,6.88C5.19,7.81 5.95,8.56 6.88,8.56M8.27,18.5V10.13H5.5V18.5H8.27Z"/>
                </svg>
            </a>
            <a href="https://github.com/davorminchorov" target="_blank" rel="noreferrer" class="pl-1">
                <svg class="h-12 w-12" viewBox="0 0 24 24">
                    <path fill="#000" d="M5,3H19A2,2 0 0,1 21,5V19A2,2 0 0,1 19,21H14.56C14.24,20.93 14.23,20.32 14.23,20.11L14.24,17.64C14.24,16.8 13.95,16.25 13.63,15.97C15.64,15.75 17.74,15 17.74,11.53C17.74,10.55 17.39,9.74 16.82,9.11C16.91,8.89 17.22,7.97 16.73,6.73C16.73,6.73 15.97,6.5 14.25,7.66C13.53,7.46 12.77,7.36 12,7.35C11.24,7.36 10.46,7.46 9.75,7.66C8.03,6.5 7.27,6.73 7.27,6.73C6.78,7.97 7.09,8.89 7.18,9.11C6.61,9.74 6.26,10.55 6.26,11.53C6.26,15 8.36,15.75 10.36,16C10.1,16.2 9.87,16.6 9.79,17.18C9.27,17.41 7.97,17.81 7.17,16.43C7.17,16.43 6.69,15.57 5.79,15.5C5.79,15.5 4.91,15.5 5.73,16.05C5.73,16.05 6.32,16.33 6.73,17.37C6.73,17.37 7.25,19.12 9.76,18.58L9.77,20.11C9.77,20.32 9.75,20.93 9.43,21H5A2,2 0 0,1 3,19V5A2,2 0 0,1 5,3Z"/>
                </svg>
            </a>
            <a href="https://twitter.com/davorminchorov" target="_blank" rel="noreferrer" class="pl-1">
                <svg class="h-12 w-12" viewBox="0 0 24 24">
                    <path fill="#1da1f2" d="M5,3H19A2,2 0 0,1 21,5V19A2,2 0 0,1 19,21H5A2,2 0 0,1 3,19V5A2,2 0 0,1 5,3M17.71,9.33C18.19,8.93 18.75,8.45 19,7.92C18.59,8.13 18.1,8.26 17.56,8.33C18.06,7.97 18.47,7.5 18.68,6.86C18.16,7.14 17.63,7.38 16.97,7.5C15.42,5.63 11.71,7.15 12.37,9.95C9.76,9.79 8.17,8.61 6.85,7.16C6.1,8.38 6.75,10.23 7.64,10.74C7.18,10.71 6.83,10.57 6.5,10.41C6.54,11.95 7.39,12.69 8.58,13.09C8.22,13.16 7.82,13.18 7.44,13.12C7.81,14.19 8.58,14.86 9.9,15C9,15.76 7.34,16.29 6,16.08C7.15,16.81 8.46,17.39 10.28,17.31C14.69,17.11 17.64,13.95 17.71,9.33Z"/>
                </svg>
            </a>
        </div>
    </div>
</template>

<script>
    import moment from 'moment';

    export default {
        methods: {
            age() {
                return moment().diff('1990-11-22', 'years') + ' years';
            },
            yearsOfExperience() {
                return moment().diff('2015-06-01', 'years') + ' years';
            },
            withAdevaSince() {
                return moment().diff('2018-01-17', 'years') + ' years'
            },
            withQuantoxSince() {
                return moment().diff('2019-12-01', 'months') + ' months'
            },
            workedAtTabellariusFor() {
                return moment('2016-03-31').diff('2015-06-01', 'months') + ' months'
            },
            workedAtNewMediaCorpFor() {
                return moment('2017-02-28').diff('2016-04-12', 'months') + ' months'
            },
            workedAtRoutyxFor() {
                return moment('2017-12-31').diff('2017-03-01', 'months') + ' months'
            },
        }
    }

</script>
