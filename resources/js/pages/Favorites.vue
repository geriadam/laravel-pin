<template>
  <div class="container mx-auto pt-10">
    <h1 class="text-3xl font-bold text-center mb-10">FAVORITES</h1>
    <div class="masonry-1-col md:masonry-2-col lg:masonry-4-col gap-5 mx-auto space-y-3 pb-28">
      <div v-for="(pin, i) in pins" :key="i">
        <PinItem :index="index" :title="pin.title" :description="pin.description" :image="pin.image" />
      </div>
    </div>
  </div>
</template>
<script>
import PinItem from '@/components/PinItem.vue';
export default {
  components: {
    PinItem
  },
  data() {
    return {
      pins: [
        {
          title: 'Testing',
          description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse sed facilisis justo, quis porta est. Nullam imperdiet sagittis porta. Mauris nibh ligula, ultricies in quam eget, porta ultrices dolor.',
          image: 'https://i.pinimg.com/originals/6f/3e/2b/6f3e2bbfee60f1721083d88f2b4aa0be.jpg',
        },
        {
          title: 'Testing',
          description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse sed facilisis justo, quis porta est. Nullam imperdiet sagittis porta. Mauris nibh ligula, ultricies in quam eget, porta ultrices dolor.',
          image: 'https://i.pinimg.com/736x/57/b6/e6/57b6e606028e58286aab71526dba2edb.jpg'
        },
        {
          title: 'Testing',
          description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse sed facilisis justo, quis porta est. Nullam imperdiet sagittis porta. Mauris nibh ligula, ultricies in quam eget, porta ultrices dolor.',
          image: 'https://i.pinimg.com/736x/ba/ef/bb/baefbb55ddc7153d30f7cae19e2ee6fd.jpg'
        },
        {
          title: 'Testing',
          description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse sed facilisis justo, quis porta est. Nullam imperdiet sagittis porta. Mauris nibh ligula, ultricies in quam eget, porta ultrices dolor.',
          image: 'https://i.pinimg.com/originals/23/7b/bf/237bbf4634562d43692920d0efcc9615.jpg'
        },
        {
          title: 'Testing',
          description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse sed facilisis justo, quis porta est. Nullam imperdiet sagittis porta. Mauris nibh ligula, ultricies in quam eget, porta ultrices dolor.',
          image: 'https://i.pinimg.com/originals/37/0a/b0/370ab058663781b864d9398c61e19015.jpg'
        },
        {
          title: 'Testing',
          description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse sed facilisis justo, quis porta est. Nullam imperdiet sagittis porta. Mauris nibh ligula, ultricies in quam eget, porta ultrices dolor.',
          image: 'https://i.pinimg.com/originals/6f/3e/2b/6f3e2bbfee60f1721083d88f2b4aa0be.jpg'
        },
        {
          title: 'Testing',
          description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse sed facilisis justo, quis porta est. Nullam imperdiet sagittis porta. Mauris nibh ligula, ultricies in quam eget, porta ultrices dolor.',
          image: 'https://i.pinimg.com/736x/57/b6/e6/57b6e606028e58286aab71526dba2edb.jpg'
        },
        {
          title: 'Testing',
          description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse sed facilisis justo, quis porta est. Nullam imperdiet sagittis porta. Mauris nibh ligula, ultricies in quam eget, porta ultrices dolor.',
          image: 'https://i.pinimg.com/736x/ba/ef/bb/baefbb55ddc7153d30f7cae19e2ee6fd.jpg'
        },
        {
          title: 'Testing',
          description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse sed facilisis justo, quis porta est. Nullam imperdiet sagittis porta. Mauris nibh ligula, ultricies in quam eget, porta ultrices dolor.',
          image: 'https://i.pinimg.com/originals/23/7b/bf/237bbf4634562d43692920d0efcc9615.jpg'
        },
        {
          title: 'Testing',
          description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse sed facilisis justo, quis porta est. Nullam imperdiet sagittis porta. Mauris nibh ligula, ultricies in quam eget, porta ultrices dolor.',
          image: 'https://i.pinimg.com/originals/37/0a/b0/370ab058663781b864d9398c61e19015.jpg'
        },
        {
          title: 'Testing',
          description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse sed facilisis justo, quis porta est. Nullam imperdiet sagittis porta. Mauris nibh ligula, ultricies in quam eget, porta ultrices dolor.',
          image: 'https://i.pinimg.com/originals/6f/3e/2b/6f3e2bbfee60f1721083d88f2b4aa0be.jpg'
        },
        {
          title: 'Testing',
          description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse sed facilisis justo, quis porta est. Nullam imperdiet sagittis porta. Mauris nibh ligula, ultricies in quam eget, porta ultrices dolor.',
          image: 'https://i.pinimg.com/736x/57/b6/e6/57b6e606028e58286aab71526dba2edb.jpg'
        },
        {
          title: 'Testing',
          description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse sed facilisis justo, quis porta est. Nullam imperdiet sagittis porta. Mauris nibh ligula, ultricies in quam eget, porta ultrices dolor.',
          image: 'https://i.pinimg.com/736x/ba/ef/bb/baefbb55ddc7153d30f7cae19e2ee6fd.jpg'
        },
        {
          title: 'Testing',
          description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse sed facilisis justo, quis porta est. Nullam imperdiet sagittis porta. Mauris nibh ligula, ultricies in quam eget, porta ultrices dolor.',
          image: 'https://i.pinimg.com/originals/23/7b/bf/237bbf4634562d43692920d0efcc9615.jpg'
        },
        {
          title: 'Testing',
          description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse sed facilisis justo, quis porta est. Nullam imperdiet sagittis porta. Mauris nibh ligula, ultricies in quam eget, porta ultrices dolor.',
          image: 'https://i.pinimg.com/originals/37/0a/b0/370ab058663781b864d9398c61e19015.jpg'
        },
        {
          title: 'Testing',
          description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse sed facilisis justo, quis porta est. Nullam imperdiet sagittis porta. Mauris nibh ligula, ultricies in quam eget, porta ultrices dolor.',
          image: 'https://i.pinimg.com/originals/6f/3e/2b/6f3e2bbfee60f1721083d88f2b4aa0be.jpg'
        },
        {
          title: 'Testing',
          description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse sed facilisis justo, quis porta est. Nullam imperdiet sagittis porta. Mauris nibh ligula, ultricies in quam eget, porta ultrices dolor.',
          image: 'https://i.pinimg.com/736x/57/b6/e6/57b6e606028e58286aab71526dba2edb.jpg'
        },
        {
          title: 'Testing',
          description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse sed facilisis justo, quis porta est. Nullam imperdiet sagittis porta. Mauris nibh ligula, ultricies in quam eget, porta ultrices dolor.',
          image: 'https://i.pinimg.com/736x/ba/ef/bb/baefbb55ddc7153d30f7cae19e2ee6fd.jpg'
        },
        {
          title: 'Testing',
          description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse sed facilisis justo, quis porta est. Nullam imperdiet sagittis porta. Mauris nibh ligula, ultricies in quam eget, porta ultrices dolor.',
          image: 'https://i.pinimg.com/originals/23/7b/bf/237bbf4634562d43692920d0efcc9615.jpg'
        },
        {
          title: 'Testing',
          description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse sed facilisis justo, quis porta est. Nullam imperdiet sagittis porta. Mauris nibh ligula, ultricies in quam eget, porta ultrices dolor.',
          image: 'https://i.pinimg.com/originals/37/0a/b0/370ab058663781b864d9398c61e19015.jpg'
        },
        {
          title: 'Testing',
          description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse sed facilisis justo, quis porta est. Nullam imperdiet sagittis porta. Mauris nibh ligula, ultricies in quam eget, porta ultrices dolor.',
          image: 'https://i.pinimg.com/originals/6f/3e/2b/6f3e2bbfee60f1721083d88f2b4aa0be.jpg'
        },
        {
          title: 'Testing',
          description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse sed facilisis justo, quis porta est. Nullam imperdiet sagittis porta. Mauris nibh ligula, ultricies in quam eget, porta ultrices dolor.',
          image: 'https://i.pinimg.com/736x/57/b6/e6/57b6e606028e58286aab71526dba2edb.jpg'
        },
        {
          title: 'Testing',
          description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse sed facilisis justo, quis porta est. Nullam imperdiet sagittis porta. Mauris nibh ligula, ultricies in quam eget, porta ultrices dolor.',
          image: 'https://i.pinimg.com/736x/ba/ef/bb/baefbb55ddc7153d30f7cae19e2ee6fd.jpg'
        },
        {
          title: 'Testing',
          description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse sed facilisis justo, quis porta est. Nullam imperdiet sagittis porta. Mauris nibh ligula, ultricies in quam eget, porta ultrices dolor.',
          image: 'https://i.pinimg.com/originals/23/7b/bf/237bbf4634562d43692920d0efcc9615.jpg'
        },
        {
          title: 'Testing',
          description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse sed facilisis justo, quis porta est. Nullam imperdiet sagittis porta. Mauris nibh ligula, ultricies in quam eget, porta ultrices dolor.',
          image: 'https://i.pinimg.com/originals/37/0a/b0/370ab058663781b864d9398c61e19015.jpg'
        },
        {
          title: 'Testing',
          description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse sed facilisis justo, quis porta est. Nullam imperdiet sagittis porta. Mauris nibh ligula, ultricies in quam eget, porta ultrices dolor.',
          image: 'https://i.pinimg.com/originals/23/7b/bf/237bbf4634562d43692920d0efcc9615.jpg'
        },
        {
          title: 'Testing',
          description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse sed facilisis justo, quis porta est. Nullam imperdiet sagittis porta. Mauris nibh ligula, ultricies in quam eget, porta ultrices dolor.',
          image: 'https://i.pinimg.com/originals/37/0a/b0/370ab058663781b864d9398c61e19015.jpg'
        },
        {
          title: 'Testing',
          description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse sed facilisis justo, quis porta est. Nullam imperdiet sagittis porta. Mauris nibh ligula, ultricies in quam eget, porta ultrices dolor.',
          image: 'https://i.pinimg.com/736x/57/b6/e6/57b6e606028e58286aab71526dba2edb.jpg'
        },
      ]
    }
  }
}

</script>