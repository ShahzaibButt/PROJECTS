using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Configuration;
using System.Data;
using System.Data.SqlClient;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;
using MaterialSkin;
using MaterialSkin.Controls;
using MaterialSkin.Animations;

namespace WindowsFormsApplication1
{
    public partial class Form6 : MaterialForm
    {
        SqlConnection con;
        SqlCommand cmd;
        SqlDataAdapter da;
        //SqlTableAdapter sta;
        public Form6()
        {
            InitializeComponent();
        }

       private void label3_Click(object sender, EventArgs e)
        {

        }

        private void Form6_Load(object sender, EventArgs e)
        {
           
        }

       /* private void dataGridView1_CellContentClick(object sender, DataGridViewCellEventArgs e)
        {
            textBox1.Text = dataGridView1.Rows[e.RowIndex].Cells[0].Value.ToString();
            textBox4.Text = dataGridView1.Rows[e.RowIndex].Cells[1].Value.ToString();
            textBox2.Text = dataGridView1.Rows[e.RowIndex].Cells[2].Value.ToString();
            textBox5.Text = dataGridView1.Rows[e.RowIndex].Cells[3].Value.ToString();
            textBox3.Text = dataGridView1.Rows[e.RowIndex].Cells[4].Value.ToString();
           // textBox6.Text = dataGridView1.Rows[e.RowIndex].Cells[5].Value.ToString();
        }*/

        private void button1_Click(object sender, EventArgs e)
        {
            con = new SqlConnection(@"Data Source=FAIRCOM-4192055\SQLSERVER2014;Initial Catalog=martdata;Integrated Security=True");
            con.Open();
            cmd = new SqlCommand("update mart Set name=@NAME,username=@USERNAME,email=@EMAIL,contactno=@CONTACT#,password=@PASSWORD where username=@USERNAME", con);
            cmd.Parameters.AddWithValue("name", textBox1.Text);
            cmd.Parameters.AddWithValue("username", textBox2.Text);
            cmd.Parameters.AddWithValue("email", textBox3.Text);
            cmd.Parameters.AddWithValue("contact#", textBox4.Text);
            cmd.Parameters.AddWithValue("password", textBox5.Text);
            cmd.ExecuteNonQuery();
            da = new SqlDataAdapter(cmd);
            DataTable dt = new DataTable();
            da.Fill(dt);

            dataGridView1.DataSource = dt;
            da.Update(dt);


            

            con.Close();

        }

        private void BACK_Click(object sender, EventArgs e)
        {
            new Form3().Show();
        }

        private void dataGridView1_CellContentClick(object sender, DataGridViewCellEventArgs e)
        {

        }

        private void LOAD_Click(object sender, EventArgs e)
        {
            con = new SqlConnection(@"Data Source=FAIRCOM-4192055\SQLSERVER2014;Initial Catalog=martdata;Integrated Security=True");
            cmd = new SqlCommand("select * from mart", con);
            con.Open();
            da = new SqlDataAdapter(cmd);
            DataTable dt = new DataTable();
            da.Fill(dt);
            BindingSource bs = new BindingSource();
            bs.DataSource = dt;
            dataGridView1.DataSource = bs;
            da.Update(dt);


            con.Close();
        }
    }
}
