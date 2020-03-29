# ServerDocument
PocketMine-MP plugin.

## 📚 Usage
Join the server and enter the ``/sd`` command.  

When you enter the command, the files and folders in the  
"public" folder will be displayed.

## 🛠 Setup
Put the plugin in the plugin folder and place the files in the data folder.   
### Supported formats
#### 📂 Folder
Folders can store files.  
It is also possible to store folders inside folders.
 
#### 📄 Text file
Files with the extension ".txt" output the text of the file contents.  

#### 📄 YAML file
Various settings can be made for files with the extension ".yml".  
Currently, it supports command execution.  

**・Execute command**  
Example of executing "/say happy !!"  
happy.yml ↓↓
```yaml
type: command
cmd-body: say Happy!!
```

### Example of file placement
```
📂plugin_data
 ┗ 📂ServerDocument
    ┗ 📂public
      --------------------------
     | ┣ 📜File1.txt            
     | ┣ 📜てきとう.txt           
     | ┣ 📂Folder               
     | ┃  ┗ 📜Hoge.txt      
     | ┗ 📂Rule                      ← Display on server
     |    ┣ 📜Example.yml         
     |    ┣ 📜General.txt         
     |    ┣ 📜Fuga.txt         
     |    ┗ 📂Folder3           
     |       ┗📜MyDeacy.txt     
      --------------------------
```


## 📹 Movie
[![](https://img.youtube.com/vi/Xie3lU6gzdc/0.jpg)](https://www.youtube.com/watch?v=Xie3lU6gzdc)


## 📷 ScreenShots
![image](https://raw.githubusercontent.com/MyDeacy/ServerDocument-PMMP/master/images/image1.png)
![image](https://raw.githubusercontent.com/MyDeacy/ServerDocument-PMMP/master/images/image2.png)
![image](https://raw.githubusercontent.com/MyDeacy/ServerDocument-PMMP/master/images/image3.png)

