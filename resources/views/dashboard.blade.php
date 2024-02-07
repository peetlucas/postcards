<x-layout>
  <x-card class="p-10">
    <header>
      <h1 class="text-3xl text-center font-bold my-6 uppercase">
        Management Dashboard
      </h1>
    </header>
    <p class="text-red-600 font-bold my-6 uppercase">For the moment only the postcards button is working. Try it!</p>
    <table class="w-full table-auto rounded-sm">
      <tbody>       
        <tr class="border-gray-300">
          <td class="px-4 py-8 border-t border-b border-gray-300 text-lg ">
            <a href="/postcards/manage" class="mr-1 bg-pink-800 text-right rounded-xl text-white py-8 px-6"><i class="fa-solid fa-image">  Postcards</i></a>
          </td>
          <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
            <a href="#" class="mr-1 bg-blue-700 text-right rounded-xl text-white py-8 px-12"><i class="fa-solid fa-people-group"> Teams</i></a>
          </td>
          <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
            <a href="#" class="mr-1 bg-orange-700 text-right rounded-xl text-white py-8 px-16"><i class="fa-solid fa-user"> Users</i></a>
          </td>
          <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
            <a href="#" class="mr-1 bg-green-700 text-right rounded-xl text-white py-8 px-12"><i class="fa-solid fa-envelope"> Emails</i></a>
          </td>
        </tr>          
      </tbody>
    </table>
  </x-card>
</x-layout>
