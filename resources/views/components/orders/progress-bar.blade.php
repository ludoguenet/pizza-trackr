<nav aria-label="Progress" x-data="orderProgress({{ $order->id }})">
    <ol role="list" class="divide-y divide-gray-300 rounded-md border border-gray-300 md:flex md:divide-y-0">
        <template x-for="(step, index) in steps" :key="index">
            <li class="relative md:flex md:flex-1">
                <a href="#" class="group flex w-full items-center" :aria-current="step.current ? 'step' : null">
                    <span class="flex items-center px-6 py-4 text-sm font-medium">

                        <!-- Completed Step -->
                        <template x-if="step.completed">
                            <span
                                class="flex h-10 w-10 flex-shrink-0 items-center justify-center rounded-full bg-emerald-600 group-hover:bg-emerald-800">
                                <svg class="h-6 w-6 text-white" viewBox="0 0 24 24" fill="currentColor"
                                    aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M19.916 4.626a.75.75 0 0 1 .208 1.04l-9 13.5a.75.75 0 0 1-1.154.114l-6-6a.75.75 0 0 1 1.06-1.06l5.353 5.353 8.493-12.74a.75.75 0 0 1 1.04-.207Z"
                                        clip-rule="evenodd" />
                                </svg>
                            </span>
                        </template>

                        <!-- Current Step -->
                        <template x-if="step.current">
                            <span
                                class="flex h-10 w-10 flex-shrink-0 items-center justify-center rounded-full border-2 border-emerald-600">
                                <span class="text-emerald-600" x-text="index + 1" />
                            </span>
                        </template>

                        <!-- Upcoming Step -->
                        <template x-if="! step.completed && ! step.current">
                            <span
                                class="flex h-10 w-10 flex-shrink-0 items-center justify-center rounded-full border-2 border-gray-300 group-hover:border-gray-400">
                                <span class="text-gray-500 group-hover:text-gray-900" x-text="index + 1" />
                            </span>
                        </template>

                        <span class="ml-4 text-sm font-medium"
                            :class="step.completed ? 'text-gray-900' : step.current ? 'text-emerald-600' :
                                'text-gray-500 group-hover:text-gray-900'"
                            x-text="step.name"></span>
                    </span>
                </a>

                <!-- Arrow separator for larger screens -->
                <div class="absolute right-0 top-0 hidden h-full w-5 md:block" aria-hidden="true"
                    x-show="index < steps.length - 1">
                    <svg class="h-full w-full text-gray-300" viewBox="0 0 22 80" fill="none"
                        preserveAspectRatio="none">
                        <path d="M0 -2L20 40L0 82" vector-effect="non-scaling-stroke" stroke="currentColor"
                            stroke-linejoin="round" />
                    </svg>
                </div>
            </li>
        </template>
    </ol>
</nav>

<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('orderProgress', (orderId) => ({
            orderId,
            steps: [{
                    name: 'Ordered',
                    completed: false,
                    current: false
                },
                {
                    name: 'Prep',
                    completed: false,
                    current: false
                },
                {
                    name: 'Bake',
                    completed: false,
                    current: false
                },
                {
                    name: 'Quality Check',
                    completed: false,
                    current: false
                },
                {
                    name: 'Ready',
                    completed: false,
                    current: false
                }
            ],

            init() {
                this.fetchOrderProgress();
            },

            async fetchOrderProgress() {
                try {
                    const response = await fetch(`/api/order-progress/${this.orderId}`);
                    const data = await response.json();

                    this.updateSteps(data.status);
                } catch (error) {
                    console.error('Erreur lors de la récupération des données:', error);
                }
            },

            updateSteps(currentStepIndex) {
                this.steps.forEach((step, index) => {
                    step.completed = index < currentStepIndex;
                    step.current = index === currentStepIndex;
                });
            }
        }));
    });
</script>
