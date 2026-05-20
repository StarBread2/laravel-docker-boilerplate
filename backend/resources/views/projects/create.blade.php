@extends('layouts.app')

@section('content')
    <!-- CREATE PROJECT -->
        <h1 class="text-2xl font-bold mb-4">Create Project</h1>

        <div class="mb-20 w-full">
            <form id="projectForm" class="space-y-3">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-1 gap-3">

                    <input
                        name="title"
                        placeholder="Project Title"
                        class="input pb-2 border border-gray-300 rounded-lg p-2 "
                    >

                    <textarea
                        name="description"
                        placeholder="Project Description"
                        class="input pb-2 border border-gray-300 rounded-lg p-2 "
                    ></textarea>

                    <select
                        name="status"
                        class="input pb-2 border border-gray-300 rounded-lg p-2 "
                    >
                        <option value="Pending">Pending</option>
                        <option value="In Progress">In Progress</option>
                        <option value="Completed">Completed</option>
                    </select>

                    <input
                        type="date"
                        name="due_date"
                        class="input pb-2 border border-gray-300 rounded-lg p-2 "
                    >

                </div>

                <div class="flex justify-center mt-5">

                    <button
                        class="mt-5 w-[40%] bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition font-semibold"
                        type="submit"
                    >
                        Create Project
                    </button>

                </div>

            </form>

        </div>
@endsection