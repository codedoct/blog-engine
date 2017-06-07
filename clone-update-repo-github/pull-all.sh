for i in $( ls -d /path/to/folder/contain/all-repo/* ); do
  echo $i $(basename $i)
  cd $i && git pull origin master --tags
done
