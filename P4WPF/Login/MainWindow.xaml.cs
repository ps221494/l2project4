using System;
using System.Collections.Generic;
using System.Collections.ObjectModel;
using System.Windows;
using Login.Models;

namespace Login
{
    /// <summary>
    /// Interaction logic for MainWindow.xaml
    /// </summary>
    public partial class MainWindow : Window
    {
        private ProjectDB _usersdb = new ProjectDB();

        private Users _Selectedusers;

        public Users Selectedusers
        {
            get { return _Selectedusers; }
            set { _Selectedusers = value; }
        }

        private ObservableCollection<Users> _LstUsers = new ObservableCollection<Users>();

        public ObservableCollection<Users> LstUsers
        {
            get { return _LstUsers; }
            set { _LstUsers = value; }
        }
        public MainWindow()
        {
            InitializeComponent();
            PopulateUsers();
            DataContext = this;
        }
        private void TextBox_GotFocus(object sender, RoutedEventArgs e)
        {
            TxtUserName.Text = "";
        }

        private void PasswordBox_GotFocus(object sender, RoutedEventArgs e)
        {
            txtPassword.Password = "";
        }

        private void PopulateUsers()
        {
            List<Users> UsersfromDB = _usersdb.GetUsers();

            if (UsersfromDB == null)
            {
                MessageBox.Show("ERROR");
            }
            else
            {
                LstUsers.Clear();
                foreach (Users users in UsersfromDB)
                {
                    LstUsers.Add(users);
                }
            }
        }

        private void Button_Click(object sender, RoutedEventArgs e)
        {
            List<Users> users = new List<Users>();
            users = _usersdb.GetUsers();
            string name = TxtUserName.Text;
            try
            {

                for (int i = 0; i < users.Count; i++)
                {
                    if (users[i].name == name)
                    {
                        adminwindow win = new adminwindow();
                        string password;
                        string password1 = "$2a$";
                        string password2;
                        string password3 = users[i].password;
                        password2 = password3.Substring(4, password3.Length - 4);
                        password = password1 + password2;

                        bool Correct = BCrypt.Net.BCrypt.Verify(txtPassword.Password, password);
                        if (Correct == true)
                        {
                            switch (users[i].RoleName)
                            {
                                case "management":
                                case "admin":
                                    MessageBox.Show("welkom " + name);
                                    win.Show();
                                    this.Close();

                                    break;
                                default:
                                    break;
                            }
                        }
                        else
                        {
                            MessageBox.Show("Password are incorrect!!");
                        }

                    }
                }
            }
            catch (Exception)
            {

                throw;
            }
        }
    }
}
