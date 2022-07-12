<template>
<div style="width: 80%;margin:20px auto">
<h1 class="text-3xl font-bold underline">
    Hello world!
  </h1>

  <ul class="flex">
  <li class="mr-6">
    <a class="text-blue-500 hover:text-blue-800" href="#">Active</a>
  </li>
  <li class="mr-6">
    <a class="text-blue-500 hover:text-blue-800" href="#">Link</a>
  </li>
  <li class="mr-6">
    <a class="text-blue-500 hover:text-blue-800" href="#">Link</a>
  </li>
  <li class="mr-6">
    <a class="text-gray-400 cursor-not-allowed" href="#">Disabled</a>
  </li>
</ul>

<table class="table-auto">
  <thead>
    <tr>
      <th class="px-4 py-2">Title</th>
      <th class="px-4 py-2">Author</th>
      <th class="px-4 py-2">Views</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td class="border px-4 py-2">Intro to CSS</td>
      <td class="border px-4 py-2">Adam</td>
      <td class="border px-4 py-2">858</td>
    </tr>
    <tr class="bg-gray-100">
      <td class="border px-4 py-2">A Long and Winding Tour of the History of UI Frameworks and Tools and the Impact on Design</td>
      <td class="border px-4 py-2">Adam</td>
      <td class="border px-4 py-2">112</td>
    </tr>
    <tr>
      <td class="border px-4 py-2">Intro to JavaScript</td>
      <td class="border px-4 py-2">Chris</td>
      <td class="border px-4 py-2">1,280</td>
    </tr>
  </tbody>
</table>

</div>

<!-- responsive nav -->

<nav class="flex items-center justify-between flex-wrap bg-teal-500 p-6">
  <div class="flex items-center flex-shrink-0 text-white mr-6">
    <svg class="fill-current h-8 w-8 mr-2" width="54" height="54" viewBox="0 0 54 54" xmlns="http://www.w3.org/2000/svg"><path d="M13.5 22.1c1.8-7.2 6.3-10.8 13.5-10.8 10.8 0 12.15 8.1 17.55 9.45 3.6.9 6.75-.45 9.45-4.05-1.8 7.2-6.3 10.8-13.5 10.8-10.8 0-12.15-8.1-17.55-9.45-3.6-.9-6.75.45-9.45 4.05zM0 38.3c1.8-7.2 6.3-10.8 13.5-10.8 10.8 0 12.15 8.1 17.55 9.45 3.6.9 6.75-.45 9.45-4.05-1.8 7.2-6.3 10.8-13.5 10.8-10.8 0-12.15-8.1-17.55-9.45-3.6-.9-6.75.45-9.45 4.05z"/></svg>
    <span class="font-semibold text-xl tracking-tight">Tailwind CSS</span>
  </div>
  <div class="block lg:hidden">
    <button class="flex items-center px-3 py-2 border rounded text-teal-200 border-teal-400 hover:text-white hover:border-white">
      <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Menu</title><path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/></svg>
    </button>
  </div>
  <div class="w-full block flex-grow lg:flex lg:items-center lg:w-auto">
    <div class="text-sm lg:flex-grow">
      <a href="#responsive-header" class="block mt-4 lg:inline-block lg:mt-0 text-teal-200 hover:text-white mr-4">
        Docs
      </a>
      <a href="#responsive-header" class="block mt-4 lg:inline-block lg:mt-0 text-teal-200 hover:text-white mr-4">
        Examples
      </a>
      <a href="#responsive-header" class="block mt-4 lg:inline-block lg:mt-0 text-teal-200 hover:text-white">
        Blog
      </a>
    </div>
    <div>
      <a href="#" class="inline-block text-sm px-4 py-2 leading-none border rounded text-white border-white hover:border-transparent hover:text-teal-500 hover:bg-white mt-4 lg:mt-0">Download</a>
    </div>
  </div>
</nav>

<!-- dd -->
<div class="inline-block relative w-64">
  <select class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
    <option>Really long option that will likely overlap the chevron</option>
    <option>Option 2</option>
    <option>Option 3</option>
  </select>
  <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
  </div>
</div>

<!-- list row -->
</template>
