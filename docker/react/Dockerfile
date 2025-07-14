FROM node:20.22.0

WORKDIR /app

RUN apt-get update && apt-get install -y make python3 g++

COPY frontend-react/package*.json ./
RUN npm install

COPY frontend-react/ .

EXPOSE 3000

CMD ["npm", "start"]

