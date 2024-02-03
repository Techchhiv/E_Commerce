import axios from 'axios';

export default {
  methods: {
    async getUserFromToken(token) {
        try {
          const response = await axios.get('/user', {
            headers: {
              Authorization: `Bearer ${token}`,
            },
          });
          return response.data;
        } catch (error) {
          console.error('Error fetching user data:', error);
          return null;
        }
      },
  },
};
