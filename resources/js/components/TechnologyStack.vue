<template>
    <div>
        <h3 class="text-gray-500 uppercase font-semibold text-xl text-center">Technology Stack</h3>
        <div class="flex pt-4 p-6 text-lg tracking-normal leading-normal">
            The technology stack that I use depends on the project but I usually use and have experience with the following languages, technologies, libraries and tools:
        </div>
        <div class="lg:flex lg:flex-column lg:items-start lg:justify-between md:flex md:flex-column md:items-start md:justify-between px-6 text-lg tracking-normal leading-normal">
            <ul class="lg:flex-1 mb-6">
                <span class="text-gray-500 font-semibold text-lg text-center">Front-End</span>
                <li>
                    <checkbox-marked-circle-icon class="pr-2 text-green-500" />
                    HTML5
                </li>
                <li>
                    <checkbox-marked-circle-icon class="pr-2 text-green-500" />
                    CSS3
                </li>
                <li>
                    <checkbox-marked-circle-icon class="pr-2 text-green-500" />
                    JavaScript
                </li>
                <li>
                    <checkbox-marked-circle-icon class="pr-2 text-green-500" />
                    Bootstrap
                </li>
                <li>
                    <checkbox-marked-circle-icon class="pr-2 text-green-500" />
                    jQuery
                </li>
                <li>
                    <checkbox-marked-circle-icon class="pr-2 text-green-500" />
                    VueJS
                </li>
                <li>
                    <checkbox-marked-circle-icon class="pr-2 text-green-500" />
                    Webpack
                </li>
                <li>
                    <checkbox-marked-circle-icon class="pr-2 text-green-500" />
                    Tailwind CSS
                </li>
            </ul>
            <ul class="lg:flex-1 mb-6">
                <span class="text-gray-500 font-semibold text-lg text-center">Back-End</span>
                <li>
                    <checkbox-marked-circle-icon class="pr-2 text-green-500" />
                    PHP 7
                </li>
                <li>
                    <checkbox-marked-circle-icon class="pr-2 text-green-500" />
                    Laravel
                </li>
                <li>
                    <checkbox-marked-circle-icon class="pr-2 text-green-500" />
                    Lumen
                </li>
                <li>
                    <checkbox-marked-circle-icon class="pr-2 text-green-500" />
                    NodeJS
                </li>
                <li>
                    <checkbox-marked-circle-icon class="pr-2 text-green-500" />
                    ExpressJS
                </li>
                <li>
                    <checkbox-marked-circle-icon class="pr-2 text-green-500" />
                    AdonisJS
                </li>
            </ul>
            <ul class="lg:flex-1 mb-6">
                <span class="text-gray-500 font-semibold text-lg text-center">Databases</span>
                <li>
                    <checkbox-marked-circle-icon class="pr-2 text-green-500" />
                    MySQL
                </li>
                <li>
                    <checkbox-marked-circle-icon class="pr-2 text-green-500" />
                    MongoDB
                </li>
                <li>
                    <checkbox-marked-circle-icon class="pr-2 text-green-500" />
                    Redis
                </li>
            </ul>
            <ul class="lg:flex-1 mb-6">
                <span class="text-gray-500 font-semibold text-lg text-center">Other</span>
                <li>
                    <checkbox-marked-circle-icon class="pr-2 text-green-500" />
                    NGINX
                </li>
                <li>
                    <checkbox-marked-circle-icon class="pr-2 text-green-500" />
                    Git & GitHub
                </li>
                <li>
                    <checkbox-marked-circle-icon class="pr-2 text-green-500" />
                    Ubuntu
                </li>
                <li>
                    <checkbox-marked-circle-icon class="pr-2 text-green-500" />
                    Docker
                </li>
                <li>
                    <checkbox-marked-circle-icon class="pr-2 text-green-500" />
                    PHPStorm
                </li>
                <li>
                    <checkbox-marked-circle-icon class="pr-2 text-green-500" />
                    PHPUnit
                </li>
                <li>
                    <checkbox-marked-circle-icon class="pr-2 text-green-500" />
                    Jenkins (CI/CD)
                </li>
            </ul>
        </div>
    </div>
</template>
<script>
    import CheckboxMarkedCircleIcon from 'vue-material-design-icons/CheckboxMarkedCircle.vue';

    export default {
        components: {
            CheckboxMarkedCircleIcon,
        },
    }
</script>
