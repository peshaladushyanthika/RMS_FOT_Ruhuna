<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Research Management System</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-gray-200 flex items-center justify-center px-6">

    <div class="w-full max-w-5xl bg-white border border-gray-300 shadow-xl rounded-sm overflow-hidden">
        <!-- Large University Header Section -->
        <div class="bg-white py-16 px-10 text-center border-b border-gray-200">
            <h2 class="text-3xl font-bold text-gray-800 mb-2">
                University of Ruhuna
            </h2>

            <h3 class="text-2xl font-semibold text-gray-700 mb-2">
                Faculty of Technology
            </h3>

            <p class="text-lg text-gray-600 mb-6">
                Department of Information and Communication Technology
            </p>

            <h1 class="text-4xl font-bold text-blue-800 mb-3">
                Research Management System
            </h1>

            <p class="text-gray-600 text-lg">
                Final Year Project, Research Progress & Submission Management Portal
            </p>
        </div>

        <!-- Small Login Options Section -->
        <div class="bg-gray-50 py-10 px-10 text-center">
            <p class="text-gray-700 text-lg mb-8 font-medium">
                Select Your Login Portal
            </p>

            <div class="flex flex-col md:flex-row justify-center gap-6 max-w-2xl mx-auto">
                <!-- Admin Panel -->
                <a href="{{ url('/admin') }}"
                   class="flex-1 bg-blue-600 hover:bg-blue-700 text-white rounded-lg py-4 px-4 shadow-sm transition duration-300">
                    <div class="text-lg font-semibold mb-1">Admin Panel</div>
                    <div class="text-xs opacity-90">
                        Manage groups, students, supervisors & submissions
                    </div>
                </a>

                <!-- Student Portal -->
                <a href="{{ url('/student') }}"
                   class="flex-1 bg-green-600 hover:bg-green-700 text-white rounded-lg py-4 px-4 shadow-sm transition duration-300">
                    <div class="text-lg font-semibold mb-1">Student Portal</div>
                    <div class="text-xs opacity-90">
                        Upload documents, view feedback & schedules
                    </div>
                </a>
            </div>
        </div>

        <!-- Footer -->
        <div class="text-center text-sm text-gray-500 py-5 border-t bg-white">
            Academic Research Supervision & Final Year Project Monitoring Dashboard
        </div>
    </div>

</body>
</html>
