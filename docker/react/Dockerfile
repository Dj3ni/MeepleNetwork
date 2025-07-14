FROM node:latest

WORKDIR /app

RUN apt-get update && apt-get install -y make

COPY frontend-react/package*.json ./
RUN npm install

COPY frontend-react/ .

EXPOSE 5173

CMD ["npm", "start"]

