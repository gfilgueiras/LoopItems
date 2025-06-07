FROM node:20-alpine

WORKDIR /app

RUN apk update && apk add --no-cache \
  screen \
  bash \
  curl \
  git \
  && rm -rf /var/cache/apk/*

ENV PATH /app/node_modules/.bin:$PATH

CMD ["tail", "-f", "/dev/null"]
