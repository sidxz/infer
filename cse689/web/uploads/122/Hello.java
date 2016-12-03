import java.io.File;
import java.io.FileInputStream;
import java.io.FileOutputStream;
import java.io.IOException;
import java.io.OutputStream;
import java.util.Random;

class Hello {
  int test() {
    String s = null;
    return s.length();
  }
  void twoResources() throws IOException {
    FileInputStream fis = null;
    FileOutputStream fos = null;
    try {
      fis = new FileInputStream(new File("whatever.txt"));
      fos = new FileOutputStream(new File("everwhat.txt"));
      fos.write(fis.read());
    } finally {
      if (fis != null) { fis.close(); }
      if (fos != null) { fos.close(); }
    }
  }

}
