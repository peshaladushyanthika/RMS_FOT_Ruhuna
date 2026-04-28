<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Research Management System</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-gray-100">

  <!-- Full Screen Hero Section -->
  <section
    class="relative min-h-screen flex items-center justify-center bg-cover bg-center"
    style="background-image: linear-gradient(rgba(15,23,42,0.75), rgba(15,23,42,0.75)), url('https://images.unsplash.com/photo-1562774053-701939374585?q=80&w=1600&auto=format&fit=crop');"
  >

    <div class="w-full max-w-6xl mx-auto px-6 lg:px-12">
      <div class="bg-white/95 backdrop-blur-sm rounded-3xl shadow-2xl overflow-hidden border border-white/40">

        <!-- Header -->
        <div class="text-center px-6 md:px-12 py-10 md:py-14 border-b border-gray-200">
          <!-- University Logo -->
          <div class="flex justify-center mb-6">
            <img src="{{ asset('images/University_logo.png') }}" alt="Logo" class="w-24 h-24 md:w-28 md:h-28 object-contain">
          </div>

          <h2 class="text-2xl md:text-4xl font-bold text-gray-800 mb-2">
            University of Ruhuna
          </h2>

          <h3 class="text-lg md:text-2xl font-semibold text-gray-700 mb-2">
            Faculty of Technology
          </h3>

          <p class="text-sm md:text-lg text-gray-600 mb-6">
            Department of Information and Communication Technology
          </p>

          <h1 class="text-3xl md:text-5xl font-extrabold text-blue-800 mb-4 leading-tight">
            Research Management System
          </h1>

          <!-- <p class="text-gray-600 text-sm md:text-lg max-w-3xl mx-auto">
            Final Year Project, Research Progress, Submission Tracking,
            Supervisor Monitoring and Academic Evaluation Portal
          </p> -->
        </div>

        <!-- Login Section -->
        <div class="bg-gray-50 px-6 md:px-12 py-10 md:py-14">
          <p class="text-center text-gray-700 text-lg md:text-xl font-semibold mb-8">
            Select Your Login Portal
          </p>

          <div class="grid grid-cols-1 md:grid-cols-2 gap-6 max-w-4xl mx-auto">

            <!-- Admin Portal -->
            <a
              href="{{ url('/admin') }}"
              class="group rounded-2xl bg-blue-600 hover:bg-blue-700 transition duration-300 p-8 text-white shadow-lg"
            >
              <h3 class="text-2xl font-bold mb-3">Admin Panel</h3>
              <p class="text-sm md:text-base opacity-95 leading-relaxed">
                Manage students, supervisors, groups, evaluation
                schedules, submissions, reports and final year project records.
              </p>
            </a>

            <!-- Student Portal -->
            <a
              href="{{ url('/student') }}"
              class="group rounded-2xl bg-green-600 hover:bg-green-700 transition duration-300 p-8 text-white shadow-lg"
            >
              <h3 class="text-2xl font-bold mb-3">Student Portal</h3>
              <p class="text-sm md:text-base opacity-95 leading-relaxed">
                Upload documents, receive supervisor feedback,
                check deadlines
              </p>
            </a>
          </div>
        </div>

        <!-- Footer -->
        <div class="bg-white text-center py-6 border-t text-sm md:text-base text-gray-500 px-4">
          <!-- Academic Research Supervision & Final Year Project Monitoring Dashboard -->
        </div>
      </div>
    </div>
  </section>

</body>
</html>
