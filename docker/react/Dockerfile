FROM node:latest

WORKDIR /app

RUN apt-get update && apt-get install -y make

COPY frontend-react/package*.json ./
RUN npm install

COPY frontend-react/ .

EXPOSE 3000

CMD ["npm", "start"]

