import Axios from "axios";

export default {
    state: {
        userList: [],
        userMessage:[] //fourth usermessage
    },
    mutations: {
        //third userlist
        userList(state, payload) {
            return state.userList = payload;
        },
        userMessage(state,payload){//third user message
            return state.userMessage = payload;
        }
    },
    actions: {
        userList(context) {
            Axios.get('/userlist').then(response => {
                context.commit("userList", response.data);
            });
            //second object userlist
        },
        userMessage(context,payload){//second user message
            Axios.get('/usermessage/'+payload)
            .then(response=>{
                context.commit("userMessage", response.data);
            })
        }

    },
    getters: {
        //forth userlist
        userList(state){
            return state.userList
        },//fifth usermessage
        userMessage(state){
            return state.userMessage
        }
    }
};
