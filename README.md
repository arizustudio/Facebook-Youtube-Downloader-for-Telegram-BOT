# Facebook Intagram Youtube Downloader for Telegram BOT

All forms of risk of use and misuse of the program are beyond the responsibility of Arizu Studio<br/>
Downloader credits to cobalt (https://github.com/wukko/cobalt)

# System Requirements
- Requires PHP7 or more<br/>
install "yum -y install php-cli php php-curl" or "sudo apt install php-cli php php-curl"<br/><br/>
- FFMpeg binaries<br/>
If you want to use the auto matermark & flip mirror video feature, you need binaries from FFMpeg

# Install FFMpeg binaries in Linux
- git clone https://git.ffmpeg.org/ffmpeg.git ffmpeg
- cd ffmpeg
- ./configure
- make
- make install

# Install FFMpeg binaries in Windows
1. download https://www.gyan.dev/ffmpeg/builds/ffmpeg-git-essentials.7z
2. extract file & rename folder name
3. add to environment path YOUR_FFMPEG_FOLDER_LOCATION/bin/

# How to Install Downloader
- git clone https://github.com/arizustudio/Facebook-Youtube-Downloader-for-Telegram-BOT.git<br/>
- cd Facebook-Youtube-Downloader-for-Telegram-BOT<br/>
// edit telegtam_bot_token.txt to your telegram bot token
- php receiver.php<br/>

# Command List
- /download (post_url)<br/>
Downlaod video from TikTok, Youtube, and Instagram.<br/><br/>
- /music (youtube_url)<br/>
Download Music from YouTube<br/><br/>
- /watermark (video_link) (watermark_link)<br/>
Auto add watermark to Downloaded Video<br/><br/>
- /watermarkflip (video_link) (watermark_link)<br/>
Auto add Flip Mirrored Video and add watermark to Downloaded Video
