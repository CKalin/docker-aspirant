FROM debian:stretch-slim

USER root
RUN apt update && apt install -y curl apt-transport-https mc nano vim inetutils-* supervisor gnupg mysql-client
RUN curl -sS https://dl.yarnpkg.com/debian/pubkey.gpg | apt-key add -
RUN echo "deb https://dl.yarnpkg.com/debian/ stable main" | tee /etc/apt/sources.list.d/yarn.list
RUN curl -sL https://deb.nodesource.com/setup_10.x | bash -
RUN apt install -y nodejs yarn
RUN yarn global add @angular/cli node-sass grunt grunt-cli

CMD ["/usr/bin/supervisord", "-n"]