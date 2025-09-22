<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight text-center bg-blue-900 py-4">
            {{ __('Campus Health Clinic – Caring for Students') }}
        </h2>
    </x-slot>

    <!-- Hero Section -->
    <section class="bg-blue-900 text-white py-20">
        <div class="max-w-7xl mx-auto px-6 lg:px-8 grid md:grid-cols-2 gap-10 items-center">
            <div class="text-center md:text-left">
                <h1 class="text-4xl md:text-6xl font-bold mb-6">Your Health, Our Priority</h1>
                <p class="text-lg md:text-xl mb-8">
                    Reliable, affordable healthcare services designed specifically for students.
                </p>
                <a href="#appointment"
                   class="px-6 py-3 bg-lime-400 text-blue-900 font-semibold rounded-lg shadow-md hover:bg-lime-500 transition">
                    Book Appointment
                </a>
            </div>
            <div class="flex justify-center md:justify-end">
                <img src="{{asset('/barro-logo/hero.png')}}" alt="Clinic"
                     class="rounded-xl shadow-lg">
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="py-20 bg-gray-100">
        <div class="max-w-7xl mx-auto px-6 lg:px-8 text-center">
            <h2 class="text-3xl font-bold text-blue-900 mb-12">Our Student Health Services</h2>
            <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-4">
                <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition border-t-4 border-lime-400">
                    <div class="text-blue-900 text-4xl mb-4">🩺</div>
                    <h3 class="text-xl font-semibold mb-2">General Checkups</h3>
                    <p class="text-gray-600">Routine physicals and preventive care for students.</p>
                </div>
                <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition border-t-4 border-lime-400">
                    <div class="text-blue-900 text-4xl mb-4">💉</div>
                    <h3 class="text-xl font-semibold mb-2">Vaccinations</h3>
                    <p class="text-gray-600">Stay protected with campus-recommended vaccines.</p>
                </div>
                <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition border-t-4 border-lime-400">
                    <div class="text-blue-900 text-4xl mb-4">🧠</div>
                    <h3 class="text-xl font-semibold mb-2">Mental Health</h3>
                    <p class="text-gray-600">Confidential counseling and therapy sessions.</p>
                </div>
                <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition border-t-4 border-lime-400">
                    <div class="text-blue-900 text-4xl mb-4">🚑</div>
                    <h3 class="text-xl font-semibold mb-2">Emergency Care</h3>
                    <p class="text-gray-600">On-campus urgent care for unexpected needs.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Health Tips Section -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-6 lg:px-8 text-center">
            <h2 class="text-3xl font-bold text-blue-900 mb-12">Student Health Tips</h2>
            <div class="grid md:grid-cols-3 gap-8">
                <div class="bg-gray-50 p-6 rounded-xl shadow hover:shadow-lg transition">
                    <h3 class="font-semibold text-lg mb-3 text-lime-600">Stay Hydrated</h3>
                    <p class="text-gray-600">Drink at least 8 glasses of water daily to stay focused in classes.</p>
                </div>
                <div class="bg-gray-50 p-6 rounded-xl shadow hover:shadow-lg transition">
                    <h3 class="font-semibold text-lg mb-3 text-lime-600">Sleep Well</h3>
                    <p class="text-gray-600">Aim for 7–8 hours of sleep to support academic performance.</p>
                </div>
                <div class="bg-gray-50 p-6 rounded-xl shadow hover:shadow-lg transition">
                    <h3 class="font-semibold text-lg mb-3 text-lime-600">Exercise Regularly</h3>
                    <p class="text-gray-600">Join campus sports or walk daily to stay fit and reduce stress.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Doctors Section -->
    <section id="team" class="py-20 bg-gray-100">
        <div class="max-w-7xl mx-auto px-6 lg:px-8 text-center">
            <h2 class="text-3xl font-bold text-blue-900 mb-12">Meet Our Medical Team</h2>
            <div class="grid gap-8 md:grid-cols-3">
                <div class="bg-white p-6 rounded-xl shadow">
                    <img src="https://via.placeholder.com/200x200?text=Dr+Smith" alt="Dr. Smith" class="rounded-full mx-auto mb-4">
                    <h3 class="text-xl font-semibold">Dr. Sarah Smith</h3>
                    <p class="text-gray-600">General Practitioner</p>
                </div>
                <div class="bg-white p-6 rounded-xl shadow">
                    <img src="https://via.placeholder.com/200x200?text=Dr+Lee" alt="Dr. Lee" class="rounded-full mx-auto mb-4">
                    <h3 class="text-xl font-semibold">Dr. James Lee</h3>
                    <p class="text-gray-600">Mental Health Specialist</p>
                </div>
                <div class="bg-white p-6 rounded-xl shadow">
                    <img src="https://via.placeholder.com/200x200?text=Dr+Patel" alt="Dr. Patel" class="rounded-full mx-auto mb-4">
                    <h3 class="text-xl font-semibold">Dr. Ayesha Patel</h3>
                    <p class="text-gray-600">Emergency Care</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Appointment Section -->
    <section id="appointment" class="py-20 bg-white text-center">
        <h2 class="text-3xl font-bold text-blue-900 mb-6">Book an Appointment</h2>
        <p class="text-gray-600 mb-8">Schedule your consultation online in just a few clicks.</p>
        <a href="#"
           class="px-8 py-3 bg-lime-400 text-blue-900 font-semibold rounded-lg shadow-md hover:bg-lime-500 transition">
            Schedule Now
        </a>
    </section>

    <!-- Insurance Info Section -->
    <section class="py-20 bg-gray-100">
        <div class="max-w-7xl mx-auto px-6 lg:px-8 text-center">
            <h2 class="text-3xl font-bold text-blue-900 mb-6">Insurance & Student Benefits</h2>
            <p class="text-gray-600 mb-8">We accept most student health plans and offer discounts for campus residents.</p>
            <div class="grid md:grid-cols-2 gap-8">
                <div class="bg-white p-6 rounded-xl shadow">
                    <h3 class="text-xl font-semibold text-lime-600 mb-2">Accepted Insurance</h3>
                    <p class="text-gray-600">CampusCare, StudentHealth+, and major national providers.</p>
                </div>
                <div class="bg-white p-6 rounded-xl shadow">
                    <h3 class="text-xl font-semibold text-lime-600 mb-2">Student Benefits</h3>
                    <p class="text-gray-600">Free flu shots, discounted prescriptions, and wellness workshops.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Student Records Section -->
    <section id="students" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <h2 class="text-3xl font-bold text-blue-900 mb-6 text-center">Student Medical Records</h2>
            <div class="overflow-x-auto bg-white rounded-xl shadow-lg">
                <table class="w-full text-left border-collapse">
                    <thead class="bg-blue-900 text-white">
                        <tr>
                            <th class="py-3 px-4">Student ID</th>
                            <th class="py-3 px-4">Name</th>
                            <th class="py-3 px-4">Age</th>
                            <th class="py-3 px-4">Condition</th>
                            <th class="py-3 px-4">Last Visit</th>
                            <th class="py-3 px-4 text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700">
                        <tr class="border-b hover:bg-gray-50">
                            <td class="py-3 px-4">STU001</td>
                            <td class="py-3 px-4">Emma Johnson</td>
                            <td class="py-3 px-4">20</td>
                            <td class="py-3 px-4">Routine Checkup</td>
                            <td class="py-3 px-4">2025-09-10</td>
                            <td class="py-3 px-4 text-center">
                                <a href="#"
                                   class="px-3 py-1 bg-lime-400 text-blue-900 text-sm rounded hover:bg-lime-500">
                                    View Record
                                </a>
                            </td>
                        </tr>
                        <tr class="border-b hover:bg-gray-50">
                            <td class="py-3 px-4">STU002</td>
                            <td class="py-3 px-4">Ryan Smith</td>
                            <td class="py-3 px-4">22</td>
                            <td class="py-3 px-4">Allergy Treatment</td>
                            <td class="py-3 px-4">2025-09-15</td>
                            <td class="py-3 px-4 text-center">
                                <a href="#"
                                   class="px-3 py-1 bg-lime-400 text-blue-900 text-sm rounded hover:bg-lime-500">
                                    View Record
                                </a>
                            </td>
                        </tr>
                        <tr class="hover:bg-gray-50">
                            <td class="py-3 px-4">STU003</td>
                            <td class="py-3 px-4">Sofia Martinez</td>
                            <td class="py-3 px-4">19</td>
                            <td class="py-3 px-4">Flu Vaccination</td>
                            <td class="py-3 px-4">2025-09-18</td>
                            <td class="py-3 px-4 text-center">
                                <a href="#"
                                   class="px-3 py-1 bg-lime-400 text-blue-900 text-sm rounded hover:bg-lime-500">
                                    View Record
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-20 bg-gray-100">
        <div class="max-w-7xl mx-auto px-6 lg:px-8 grid md:grid-cols-2 gap-12 items-center">
            <div>
                <h2 class="text-3xl font-bold text-blue-900 mb-6">Get in Touch</h2>
                <p class="text-gray-600 mb-4">📍 Campus Health Building, University Avenue</p>
                <p class="text-gray-600 mb-4">📞 +1 (555) 123-4567</p>
                <p class="text-gray-600 mb-4">✉️ clinic@university.edu</p>
                <p class="text-gray-600">🕒 Mon–Fri: 8am – 6pm</p>
            </div>
            <div class="flex justify-center md:justify-end">
                <iframe class="rounded-xl shadow-lg w-full h-64"
                        src="https://maps.google.com/maps?q=university%20campus&t=&z=13&ie=UTF8&iwloc=&output=embed">
                </iframe>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-blue-900 text-white pt-12">
        <div class="max-w-7xl mx-auto px-6 lg:px-8 grid md:grid-cols-3 gap-8 text-center md:text-left">
            
            <!-- About -->
            <div>
                <h3 class="text-xl font-semibold mb-4">
                    <img width="200" src="{{asset('/barro-logo/logo-trans.png')}}">
                </h3>
                <p class="text-gray-300 text-sm">
                    Providing quality healthcare for students with compassion and care.
                    Accessible, affordable, and dedicated to your well-being.
                </p>
            </div>

            <!-- Quick Links -->
            <div>
                <h3 class="text-xl font-semibold mb-4">Quick Links</h3>
                <ul class="space-y-2 text-gray-300 text-sm">
                    <li><a href="#hero" class="hover:underline">Home</a></li>
                    <li><a href="#services" class="hover:underline">Services</a></li>
                    <li><a href="#team" class="hover:underline">Our Doctors</a></li>
                    <li><a href="#students" class="hover:underline">Student Records</a></li>
                    <li><a href="#contact" class="hover:underline">Contact</a></li>
                </ul>
            </div>

            <!-- Contact Info -->
            <div>
                <h3 class="text-xl font-semibold mb-4">Contact Us</h3>
                <p class="text-gray-300 text-sm">Davao Oriental State University, BanayBanay Campus</p>
                <p class="text-gray-300 text-sm">Phone: (123) 456-7890</p>
                <p class="text-gray-300 text-sm">Email: clinic@university.edu</p>
            </div>
        </div>

        <!-- Bottom Line -->
        <div class="mt-8 border-t border-gray-700 text-center py-4">
            <p class="text-sm text-gray-400">&copy; {{ date('Y') }} MedyoCare. All rights reserved.</p>
        </div>
    </footer>
</x-app-layout>
