import { Link } from "react-router-dom";
import api from "../../../config";
import { useEffect, useState } from "react";
import type { PaymentMethod } from "../../../interfaces/paymentMethod.interface";
import paymentMethodDefault from "../../../interfaces/paymentMethod.interface";

function CreatePaymentMethod() {
    const [paymentMethod, setPaymentMethod] = useState<PaymentMethod>(paymentMethodDefault);
    const [payment_methos, setPayment_metho] = useState<Payment_metho[]>([]);

    useEffect(() => {
        document.title = "Create PaymentMethod";
            getPayment_methos();
    }, []);

    const getPayment_methos = () => {
        api.get("payment_methos")
        .then((res) => {
            setPayment_metho(res.data);
        })
        .catch((err) => {
            console.error(err);
        });

    function handleSubmit(e: React.FormEvent) {
        e.preventDefault();

        api.post("create-paymentMethod", paymentMethod)
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
            <Link to="/payment-methods" className="text-muted fw-light">PaymentMethods /</Link> Create
          </h4>
          <div className="card mt-3">
            <h5 className="card-header">Create PaymentMethod</h5>
            <div className="card-body">
                <form onSubmit={handleSubmit}>
                    <div className="mb-3">
                        <label className="form-label">Payment Method Id</label>
                        <select name="payment_method_id" className="form-select" onChange={(e) => setPaymentMethod({...paymentMethod, payment_method_id: parseInt(e.target.value)})}>
                            {
                                payment_methos.map((item) =>
                                    <option value={item.id} key={item.id}>{item.name}</option>
                                )
                            }
                        </select>
                    </div>
                    <div className="mb-3">
                        <label className="form-label">Method Name</label>
                        <input type="text" name="method_name" className="form-control" 
                        value={paymentMethod.method_name} 
                        onChange={(e) => setPaymentMethod({...paymentMethod, method_name: e.target.value})} />
                    </div>
                    <button type="submit" className="btn btn-primary">Submit</button>
                </form>
            </div>
          </div>
        </div>
        </>
    );
}

export default CreatePaymentMethod;