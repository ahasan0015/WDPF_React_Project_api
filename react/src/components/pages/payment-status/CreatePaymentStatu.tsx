import { Link } from "react-router-dom";
import api from "../../../config";
import { useEffect, useState } from "react";
import type { PaymentStatu } from "../../../interfaces/paymentStatu.interface";
import paymentStatuDefault from "../../../interfaces/paymentStatu.interface";

function CreatePaymentStatu() {
    const [paymentStatu, setPaymentStatu] = useState<PaymentStatu>(paymentStatuDefault);
    const [payment_statuss, setPayment_status] = useState<Payment_status[]>([]);

    useEffect(() => {
        document.title = "Create PaymentStatu";
            getPayment_statuss();
    }, []);

    const getPayment_statuss = () => {
        api.get("payment_statuss")
        .then((res) => {
            setPayment_status(res.data);
        })
        .catch((err) => {
            console.error(err);
        });

    function handleSubmit(e: React.FormEvent) {
        e.preventDefault();

        api.post("create-paymentStatu", paymentStatu)
        .then((res) => {
            console.log(res.data);
        })
        .catch((err) => {
            console.log(err);
        });
    }

    return (
        <>
        <div className="container-xxl flex-grow-1 container-p-y">
          <h4 className="fw-bold py-3 mb-4">
            <Link to="/payment-status" className="text-muted fw-light">PaymentStatus /</Link> Create
          </h4>
          <div className="card mt-3">
            <h5 className="card-header">Create PaymentStatu</h5>
            <div className="card-body">
                <form onSubmit={handleSubmit}>
                    <div className="mb-3">
                        <label className="form-label">Payment Status Id</label>
                        <select name="payment_status_id" className="form-select" onChange={(e) => setPaymentStatu({...paymentStatu, payment_status_id: parseInt(e.target.value)})}>
                            {
                                payment_statuss.map((item) =>
                                    <option value={item.id} key={item.id}>{item.name}</option>
                                )
                            }
                        </select>
                    </div>
                    <div className="mb-3">
                        <label className="form-label">Status Name</label>
                        <input type="text" name="status_name" className="form-control" 
                        value={paymentStatu.status_name} 
                        onChange={(e) => setPaymentStatu({...paymentStatu, status_name: e.target.value})} />
                    </div>
                    <button type="submit" className="btn btn-primary">Submit</button>
                </form>
            </div>
          </div>
        </div>
        </>
    );
}

export default CreatePaymentStatu;