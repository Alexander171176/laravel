<script setup>
import { Head, Link } from '@inertiajs/vue3'

defineProps({
  posts: {
    type: Array
  },
  canLogin: {
    type: Boolean
  },
  canRegister: {
    type: Boolean
  }
})
</script>

<template>
  <Head title="Post" />

  <div v-if="canLogin" class="sm:fixed sm:top-0 sm:right-0 p-6 text-end">
    <Link
      v-if="$page.props.auth.user"
      :href="route('dashboard')"
      class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
      >Dashboard</Link
    >

    <template v-else>
      <Link
        :href="route('login')"
        class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
        >Log in</Link
      >

      <Link
        v-if="canRegister"
        :href="route('register')"
        class="ms-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
        >Register</Link
      >
    </template>
  </div>

  <div class="max-w-screen-2xl mx-auto p-4 md:p-6 2xl:p-10">
    <h1 class="mb-4 text-center font-semibold text-xl text-black dark:text-white">Список постов</h1>
    <div class="flex flex-col gap-10">
      <div
        class="rounded-sm border border-stroke bg-white px-5 pt-6 pb-2.5 shadow-default dark:border-strokedark dark:bg-boxdark sm:px-7.5 xl:pb-1"
      >
        <div class="max-w-full overflow-x-auto">
          <table class="w-full table-auto">
            <thead>
              <tr class="bg-gray-2 text-left dark:bg-meta-4">
                <th class="min-w-[120px] py-4 px-4 font-medium text-black dark:text-white xl:pl-11">
                  ID
                </th>
                <th class="min-w-[120px] py-4 px-4 font-medium text-black dark:text-white xl:pl-11">
                  Название
                </th>
                <th class="min-w-[120px] py-4 px-4 font-medium text-black dark:text-white">
                  Ссылка
                </th>
                <th class="min-w-[120px] py-4 px-4 font-medium text-black dark:text-white">
                  Автор
                </th>
                <th class="min-w-[120px] py-4 px-4 font-medium text-black dark:text-white">
                  Изображение
                </th>
                <th class="min-w-[120px] py-4 px-4 font-medium text-black dark:text-white">
                  Описание
                </th>
                <th class="min-w-[120px] py-4 px-4 font-medium text-black dark:text-white">
                  Дата публикации
                </th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="post in posts" :key="post.id">
                <td class="border-b border-[#eee] py-5 px-4 dark:border-strokedark">
                  <p
                    class="inline-flex rounded-full bg-success bg-opacity-10 py-1 px-3 text-sm font-medium text-success"
                  >
                    {{ post.id }}
                  </p>
                </td>
                <td class="border-b border-[#eee] py-5 px-4 pl-9 dark:border-strokedark xl:pl-11">
                  <h5 class="font-medium text-black dark:text-white">{{ post.title }}</h5>
                </td>
                <td class="border-b border-[#eee] py-5 px-4 dark:border-strokedark">
                  <p class="text-black dark:text-white">{{ post.url }}</p>
                </td>
                <td class="border-b border-[#eee] py-5 px-4 dark:border-strokedark">
                  <p
                    class="inline-flex rounded-full bg-success bg-opacity-10 py-1 px-3 text-sm font-medium text-success"
                  >
                    {{ post.author }}
                  </p>
                </td>
                <td class="border-b border-[#eee] py-5 px-4 dark:border-strokedark">
                  <p
                    class="inline-flex rounded-full bg-success bg-opacity-10 py-1 px-3 text-sm font-medium text-success"
                  >
                    <img
                      v-if="post.image_url"
                      :src="post.image_url"
                      :alt="post.seo_alt"
                      :title="post.seo_title"
                    />
                    <span v-else>No Image</span>
                  </p>
                </td>
                <td class="border-b border-[#eee] py-5 px-4 dark:border-strokedark">
                  <p
                    class="inline-flex rounded-full bg-success bg-opacity-10 py-1 px-3 text-sm font-medium text-success"
                  >
                    {{ post.description }}
                  </p>
                </td>
                <td class="border-b border-[#eee] py-5 px-4 dark:border-strokedark">
                  <p
                    class="inline-flex rounded-full bg-success bg-opacity-10 py-1 px-3 text-sm font-medium text-success"
                  >
                    {{ post.created_at }}
                  </p>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</template>
