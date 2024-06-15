FROM webdevops/php-apache-dev:8.2
RUN apt-get update && apt-get install -y \
    build-essential \
    git \
    curl \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libmcrypt-dev \
    libgd-dev \
    jpegoptim optipng pngquant gifsicle \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip
RUN apt-get install -y \
    wget \
    fontconfig \
    fontconfig-config \
    fonts-dejavu-core \
    libbsd0 \
    libfontconfig1 \
    libfontenc1 \
    libfreetype6 \
    libjpeg62-turbo \
    libmd0 libpng16-16 \
    libx11-6 \
    libx11-data \
    libxau6 libxcb1 \
    libxdmcp6 \
    libxext6 \
    libxrender1 \
    sensible-utils \
    ucf x11-common \
    xfonts-75dpi \
    xfonts-base \
    xfonts-encodings \
    xfonts-utils
RUN wget https://github.com/wkhtmltopdf/packaging/releases/download/0.12.6-1/wkhtmltox_0.12.6-1.buster_amd64.deb
RUN dpkg -i wkhtmltox_0.12.6-1.buster_amd64.deb



# Install PHP extensions
RUN docker-php-ext-configure gd --enable-gd --with-freetype --with-jpeg
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd
RUN apt update && apt install -y zlib1g-dev libpng-dev && rm -rf /var/lib/apt/lists/*
#RUN docker-php-ext-install gd
RUN apt-get update && apt-get install -y \
    libmagickwand-dev --no-install-recommends \
    && pecl install imagick \
    && docker-php-ext-enable imagick


## Run instasl NodeJS  (20, 18, 16)
## Download and import the Nodesource GPG key
#RUN apt-get update && apt-get install -y ca-certificates curl gnupg
#RUN mkdir -p /etc/apt/keyrings
#RUN curl -fsSL https://deb.nodesource.com/gpgkey/nodesource-repo.gpg.key | gpg --dearmor -o /etc/apt/keyrings/nodesource.gpg
## Create deb repository
## Optional: can be changed depending on the version you need (20, 18, 16).
#RUN echo "deb [signed-by=/etc/apt/keyrings/nodesource.gpg] https://deb.nodesource.com/node_18.x nodistro main" | tee /etc/apt/sources.list.d/nodesource.list
#
## Run Update and Install Nodejs
#RUN apt-get update && apt-get install nodejs -y


# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*
