<template>
  <div class="livechat">
    <div class="container1 clearfix">
      <div class="people-list" id="people-list">
        <div class="search">
          <input type="text" placeholder="search">
          <i class="fa fa-search"></i>
        </div>
        <ul class="list">
          <li @click.prevent="selectUser(user.id)" class="clearfix" v-for="user in userList" :key="user.id"> <!--first select user-->
            <div class="about" >
              <div class="name">{{user.name}}</div>
              <div class="status">
                <i class="fa fa-circle online"></i> online
              </div>
            </div>
          </li>
        </ul>
      </div>

      <div class="chat">
        <div class="chat-header clearfix">
          <img
            src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/195612/chat_avatar_01_green.jpg"
            alt="avatar"
          >

          <div class="chat-about">
            <div v-if="userMessage.user" class="chat-with">Chat With {{userMessage.user.name}}</div>
            <div v-if="userMessage.user" class="chat-num-messages">{{userMessage.user.email}}</div>
            <div v-if="userMessage.user" class="chat-num-messages"> User ID {{userMessage.user.id}}</div>
          </div>
          <i class="fa fa-star"></i>
        </div>
        <!-- end chat-header -->

        <div class="chat-history" v-chat-scroll>
          <ul>
            <li class="clearfix" v-for="message in userMessage.messages" :key="message.id">
              <div class="message-data align-right">
                <span class="message-data-time">{{message.created_at | timeformat}}</span> &nbsp; &nbsp;
                <span class="message-data-name">{{message.user.name}}</span>
                <i class="fa fa-circle me"></i>
              </div>
               <div :class="`message  float-right ${message.user.id==userMessage.user.id ? 'other-message' : 'my-message'}`">
              {{message.message}}</div>
            </li>
          </ul>
        </div>
        <!-- end chat-history -->

        <div class="chat-message clearfix">
          <textarea
            @keydown.enter="sendMessage"
            v-model="message"
            name="message-to-send"
            id="message-to-send"
            placeholder="Type Your Message and Press Enter to Send" 
            rows="3"
          ></textarea>

          <i class="fa fa-file-o"></i> &nbsp;&nbsp;&nbsp;
          <i class="fa fa-file-image-o"></i>
        </div>
        <!-- end chat-message -->
      </div>
      <!-- end chat -->
    </div>
    <!-- end container -->
  </div>
</template>

<script>
export default {
  mounted() {
    Echo.private(`chat.${authuser.id}`)//from event messagesend name and authuser from design page js
    .listen('MessageSend', (e) => {
       this.selectUser(e.message.from);
        // console.log(e.message.message);
    });
    this.$store.dispatch("userList"); //object userlist first
  },
  data() {
    return{
      message:'',
    }
  },
  computed:{
    userList(){
    return this.$store.getters.userList //fifth userlist
    },
    userMessage(){
      return this.$store.getters.userMessage //sixth usermessage
    }
  },  
  created() {},
  methods:{
    selectUser(userId){ //second select user
      this.$store.dispatch('userMessage',userId); //first user Message
    },
    sendMessage(e){
      e.preventDefault();
      if(this.message!=''){
        axios.post('/sendmessage',{message:this.message,user_id:this.userMessage.user.id})
        .then(response=>{
          this.selectUser(this.userMessage.user.id);
        })
        this.message ='';
      }
    }
  }
};
</script>

<style>
.people-list ul{overflow-y: scroll!important}
</style>
