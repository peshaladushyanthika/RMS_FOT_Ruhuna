<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Research Management System</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-gray-100">

  <!-- Fully Responsive Hero Section -->
  <section
    class="relative min-h-screen flex items-center justify-center bg-cover bg-center px-4 py-6 sm:px-6 md:px-8 lg:px-10"
    style="background-image: linear-gradient(rgba(15,23,42,0.75), rgba(15,23,42,0.75)), url('https://images.unsplash.com/photo-1562774053-701939374585?q=80&w=1600&auto=format&fit=crop');"
  >

    <div class="w-full max-w-6xl mx-auto">
      <div class="bg-white/95 backdrop-blur-sm rounded-xl md:rounded-2xl lg:rounded-3xl shadow-2xl overflow-hidden border border-white/40">

        <!-- Header -->
        <div class="text-center px-4 sm:px-6 md:px-10 lg:px-14 py-8 md:py-10 lg:py-12 border-b border-gray-200">

          <!-- University Logo -->
          <div class="flex justify-center mb-5">
            <img
              src="{{ asset('images/University_logo.png') }}"
              alt="University Logo"
              class="w-20 h-20 sm:w-24 sm:h-24 md:w-28 md:h-28 object-contain"
            >
          </div>

          <h2 class="text-xl sm:text-2xl md:text-3xl lg:text-4xl font-bold text-gray-800 mb-2">
            University of Ruhuna
          </h2>

          <h3 class="text-base sm:text-lg md:text-xl lg:text-2xl font-semibold text-gray-700 mb-2">
            Faculty of Technology
          </h3>

          <p class="text-sm sm:text-base md:text-lg text-gray-600 mb-5 leading-relaxed">
            Department of Information and Communication Technology
          </p>

          <h1 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-extrabold text-blue-800 leading-tight">
            Research Management System
          </h1>
        </div>

        <!-- Login Section -->
        <div class="bg-gray-50 px-4 sm:px-6 md:px-10 lg:px-14 py-8 md:py-10 lg:py-12">

          <p class="text-center text-gray-700 text-base sm:text-lg md:text-xl font-semibold mb-8">
            Select Your Login Portal
          </p>

          <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5 md:gap-6 max-w-5xl mx-auto">

            <!-- Admin Portal -->
            <a
              href="{{ url('/admin') }}"
              class="rounded-xl md:rounded-2xl bg-blue-600 hover:bg-blue-700 transition duration-300 p-6 md:p-8 text-white shadow-lg"
            >
              <h3 class="text-xl md:text-2xl font-bold mb-3">
                Admin Panel
              </h3>

              <p class="text-sm md:text-base opacity-95 leading-relaxed">
                Manage students, supervisors, groups, evaluation schedules,
                submissions, reports and final year project records.
              </p>
            </a>

            <!-- Supervisor Portal -->
<a
  href="{{ url('/supervisor') }}"
  class="rounded-xl md:rounded-2xl bg-purple-600 hover:bg-purple-700 transition duration-300 p-6 md:p-8 text-white shadow-lg"
>
  <h3 class="text-xl md:text-2xl font-bold mb-3">
    Supervisor Panel
  </h3>

  <p class="text-sm md:text-base opacity-95 leading-relaxed">
    Monitor assigned student groups, review submissions,
    provide feedback, and manage research progress effectively.
  </p>
</a>

            <!-- Student Portal -->
            <a
              href="{{ url('/student') }}"
              class="rounded-xl md:rounded-2xl bg-green-600 hover:bg-green-700 transition duration-300 p-6 md:p-8 text-white shadow-lg"
            >
              <h3 class="text-xl md:text-2xl font-bold mb-3">
                Student Portal
              </h3>

              <p class="text-sm md:text-base opacity-95 leading-relaxed">
                Upload documents, receive supervisor feedback,
                check deadlines and manage research progress.
              </p>
            </a>
          </div>
        </div>

        <!-- Footer -->
        <div class="bg-white text-center py-4 md:py-6 border-t text-sm md:text-base text-gray-500 px-4">
        </div>

      </div>
    </div>
  </section>

</body>
</html>