import { ref } from "vue";
import axios from "axios";

export default function useQuetion()
{
    const quetions = ref([]);

    const getQuetions = async () => {
        // const response = await axios.get("https://tronton331.my.id/laravel-latihan/public/api/v1/quetions");
        const response = await axios.get("http://localhost:8000/api/v1/quetions");
        quetions.value = response.data.Quetions
    }

    return {getQuetions, quetions};
}
